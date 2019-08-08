<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Size;
use App\Category;	
use App\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
// use Request;


class ProductController extends Controller
{
    public function index(Request $request)
    {
    	$listProduct = Product::with('category')->where('deleted_at', null);
        if($request->search) {
            $listProduct = $listProduct->where('name', 'LIKE', '%'.$request->search.'%')
                                        ->orWhere('price', 'LIKE', '%'.$request->search.'%')
                                        ->orWhere('status', 'LIKE', '%'.$request->search.'%');
        } 
        if($request->cate) {
            $listProduct->where('category_id', $request->cate);
        }
        $listProduct = $listProduct->orderBy('id', 'DESC')->paginate(5);
        $categories = Category::where('parent_id', '<>', 0)->get();
    	return view('admin.product.index', compact('listProduct', 'categories'));
    }

    public function create()
    {
    	// $listCategory = Category::where('parent_id', '<>', '0')->get();
        $cate_parent = Category::where('parent_id', 0)->get();
        $category_id = Category::where('parent_id', 1)->orWhere('parent_id', 2)->get();    
    	return view('admin.product.create', compact('cate_parent', 'category_id'));
    }
    public function store(ProductRequest $request)
    {
        $productCreate = Product::create([
            'name'        => $request->name,
            'status'      => $request->status,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $request->file('image')->getClientOriginalName(),
            'cate_parent' => $request->cate_parent,
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

    	return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => 'Chúc mừng ! Bạn đã thêm sản phẩm thành công.']);
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
        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => 'Bạn đã xóa sản phẩm thành công.']);
    }

    public function edit($id)
    {
        $cate_parent = Category::where('parent_id', 0)->get();
        $category_id = Category::where('parent_id', 1)->orWhere('parent_id', 2)->get();
        $listCategory = Category::all();
        $product = Product::find($id);
        $product_img = Product::find($id)->images;
        return view('admin.product.edit', compact('product', 'listCategory', 'product_img', 'cate_parent', 'category_id'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->only('category_id', 'cate_parent', 'name', 'status', 'price', 'description');
        $product->update($data);

        // Delete & Change image
        $img_current = 'upload/'.$request->input('img_current');
        if (!empty($request->File('image'))) {
            $file_name = $request->File('image')->getClientOriginalName();
            $product->image = $file_name;
            $request->File('image')->move(public_path('upload/'), $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        } else {
            echo "Khong co file";
        }
        $product->save();

        // Insert image detail
        if (!empty($request->File('image_detail'))) {
            foreach ($request->File('image_detail') as $file) {
                
                $product_img = new Image();
                if (isset($file)) {
                    $product_img->name       = $file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move(public_path('upload/detail/'), $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => 'Chúc mừng ! Bạn đã cập nhật thông tin sản phẩm thành công.']);
    }

    public function delImage(Request $request, $id)
    {
        if ($request->ajax()) {
            $idHinh = (int)$request->get('idHinh');
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

    public function getCategory($idCate_parent)
    {
        $category_id = Category::where('parent_id', $idCate_parent)->get();
        foreach ($category_id as $cate) {
            echo "<option value='".$cate->id."'>".$cate->name."</option>";
        }
    }
}
