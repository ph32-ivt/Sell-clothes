<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Order;
use App\Product;
use App\Comment;
use App\User;
use DB;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
    	$listCategory = DB::table('categories');
        if($request->search) {
            $listCategory = $listCategory->where('name', 'LIKE', '%'.$request->search.'%');
        }
        $listCategory = $listCategory->orderBy('id', 'DESC')->paginate(10);
    	return view('admin.category.index', compact('listCategory'));
    }

    public function create()
    {
    	$cate_parent = Category::where('parent_id', 0)->get();
    	return view('admin.category.create', compact('cate_parent'));
    }

    public function store(CategoryRequest $request)
    {
    	$categoryCreate = Category::create([
            'name'      => $request->name,
            'parent_id' => $request->parent_id
    	]);
    	return redirect()->route('category-list')->with([ 'type_message' => 'success', 'flash_message' => 'Bạn đã thêm Danh mục thành công !' ]);
    }

    public function edit($id)
    {
    	$category = Category::find($id)->toArray();
        $cate_parent = Category::select('id', 'name', 'parent_id')->get()->toArray();
    	return view('admin.category.edit', compact('category', 'cate_parent'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            ["name" => "required"],
            ['name.required' => "Vui lòng nhập tên Danh mục !"]
        );
    	$category = Category::find($id);
    	$data = $request->all();
    	$category->update($data);
    	return redirect()->route('category-list')->with(['type_message' => 'success', 'flash_message' => 'Bạn đã sửa Danh mục thành công !']);
    }

    public function delete($id)
    {
        $parent = Category::where('parent_id', $id)->count();
        if ( $parent == 0) {
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('category-list')->with(['type_message' => 'success', 'flash_message' => 'Bạn đã xóa thành công !']);
        } else {
            echo "<script type='text/javascript'>
                alert('Xin lỗi ! Bạn không thể xóa Danh mục này');
                window.location = '";
                    echo route('category-list');
            echo"'
            </script>";
        }   	
    }


    public function dashboard()
    {
        $order = Order::all();
        $product = Product::all();
        $comment = Comment::all();
        $user = User::all();
        return view('admin.layouts.dashboard', compact('order', 'product', 'comment', 'user'));
    }

}
