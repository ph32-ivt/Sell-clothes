<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
    	$listCategory = Category::all();
    	return view('admin.category.index', compact('listCategory'));
    }

    public function create()
    {
    	$cate_parent = Category::all()->toArray();
    	return view('admin.category.create', compact('cate_parent'));
    }

    public function store(CategoryRequest $request)
    {
    	$categoryCreate = Category::create([
            'name'      => $request->name,
            'parent_id' => $request->parent_id
    	]);
    	return redirect()->route('category-list')->with([ 'type_message' => 'success', 'flash_message' => 'Bạn đã thêm category thành công !' ]);
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
            ['name.required' => "Please enter Name Category !"]
        );
    	$category = Category::find($id);
    	$data = $request->all();
    	$category->update($data);
    	return redirect()->route('category-list')->with(['type_message' => 'success', 'flash_message' => 'Bạn đã sửa Category thành công !']);
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
                alert('Sorry ! You can not Delete this Category');
                window.location = '";
                    echo route('category-list');
            echo"'
            </script>";

        }
    	
    }
}
