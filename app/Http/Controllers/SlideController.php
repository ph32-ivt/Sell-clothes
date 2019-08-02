<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function index()
    {
    	$slides = Slide::all();
    	return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
    	return view('admin.slide.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'title' => 'required',
    		'content' => 'required'
    	], 
    	[
    		'name.required' => 'Vui lòng nhập tên !',
    		'title.required' => 'Vui lòng nhập tiêu đề !',
    		'content.required' => 'Vui lòng nhập nội dung'
    	]);

    	$data = $request->all();
    	$data['name'] = $request->file('name')->getClientOriginalName();
    	$slide = Slide::create($data);
    	$request->file('name')->move(public_path('upload/slides/'), $request->file('name')->getClientOriginalName());
    	return redirect()->route('slide-list')->with(['type_message' => 'success', 'flash_message' => 'Chúc mừng ! Bạn đã tạo mới thành công.']);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
    	
    }
}
