<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

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
    		'name.required' => 'Please choosse file !',
    		'title.required' => 'Please enter title !',
    		'content.required' => 'Please enter content !'
    	]);

    	$data = $request->all();
    	$data['name'] = $request->file('name')->getClientOriginalName();
    	$slide = Slide::create($data);
    	$request->file('name')->move(public_path('upload/slides/'), $request->file('name')->getClientOriginalName());
    	return redirect()->route('slide-list')->with(['type_message' => 'success', 'flash_message' => 'Congruation ! You added success.']);
    }

    public function edit($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->only('content', 'title', 'name', 'link');
    	$slide = Slide::find($id);
    	$slide->update($data);

    	// Nếu tải file mới lên thì sẽ xóa file cũ đi
    	$img_current = public_path('upload/slides/').$request->input('img_current');
        if (!empty($request->File('name'))) {
            $file_name = $request->File('name')->getClientOriginalName();
            $slide->name = $file_name;
            $request->File('name')->move(public_path('upload/slides'), $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
            echo "Có file";
        } else {
            echo "Khong co file";
        }
        $slide->save();
    	return redirect()->route('slide-list')->with(['type_message' => 'success', 'flash_message' => 'Congruation ! You updated success.']);
    }

    public function delete($id)
    {
    	$slide = Slide::find($id);
    	File::delete(public_path('upload/slides/'.$slide->name));
    	$slide->delete();
    	return redirect()->route('slide-list')->with(['type_message' => 'success', 'flash_message' => 'Congruation ! You delete success.']);
    }
}
