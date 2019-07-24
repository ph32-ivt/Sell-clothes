<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Size;
use App\Category;	
use App\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Request;

class ProductController extends Controller
{
    public function index()
    {
    	$listProduct = Product::all();
    	return view('admin.product.index', compact('listProduct'));
    }

    public function create()
    {
    	// $listCategory = Category::where('parent_id', '<>', '0')->get();
        $listCategory = Category::all();    
    	return view('admin.product.create', compact('listCategory'));
    }
    public function store(ProductRequest $request)
    {
        $productCreate = Product::create([
            'name'        => $request->name,
            'status'      => $request->status,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $request->file('image')->getClientOriginalName(),
            'category_id' => $request->category_id,
            $request->file('image')->move(public_path('upload/'), $request->file('image')->getClientOriginalName())
        ]);

        // Insert data to image table
        $product_id = $productCreate->id;
        if ($request->hasFile('image_detail')) {
            foreach ($request->file('image_detail') as $file) {
                $product_img = new Image();
                if (isset($file)) {
                    $product_img->name       = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move(public_path('upload/detail/'), $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

    	return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => 'Congruation ! You added success.']);
    }

    public function delete($id)
    {
        $product_detail = Product::find($id)->images->toArray();
        foreach ($product_detail as $value) {
            File::delete(public_path('/upload/detail/'.$value['name'])); 
        }
        $product = Product::find($id);
        File::delete(public_path('upload/'.$product->image));
        $product->delete();
        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => 'Congruation ! You delete success.']);
    }

    public function edit($id)
    {
        $listCategory = Category::all();
        $product = Product::find($id);
        $product_img = Product::find($id)->images;
        return view('admin.product.edit', compact('product', 'listCategory', 'product_img'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = Request::except('_token');
        $data = Request::only('category_id', 'name', 'status', 'price', 'description');
        $product->update($data);

        // Delete & Change image
        $img_current = 'upload/'.Request::input('img_current');
        if (!empty(Request::File('image'))) {
            $file_name = Request::File('image')->getClientOriginalName();
            $product->image = $file_name;
            Request::File('image')->move(public_path('upload/'), $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        } else {
            echo "Khong co file";
        }
        $product->save();

        // Insert image detail
        if (!empty(Request::File('image_detail'))) {
            foreach (Request::File('image_detail') as $file) {
                // $image_detail = new Image;
                // if (isset($file)) {
                //     $image_detail->name = $file->getClientOriginalName();
                //     $image_detail->product_id = $id;
                //     $file->move(public_path('upload/detail/'), $file->getClientOriginalName());
                //     $image_detail->save();
                // }
                $product_img = new Image();
                if (isset($file)) {
                    $product_img->name       = $file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move(public_path('upload/detail/'), $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => 'Congruation ! You update success.']);
    }

    public function delImage($id)
    {
        if (Request::ajax()) {
            $idHinh = (int)Request::get('idHinh');
            $image_detail = Image::find($idHinh);
            if (!empty($image_detail)) {
                $img = 'upload/detail/'.$image_detail->name;
                if (File::exists($img)) {
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }
}
