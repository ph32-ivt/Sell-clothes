<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Image;
use DB;
use App\Mail\ContactMail;
use App\Cart;
use Session;
use App\Size;
use App\Comment;

class PageController extends Controller
{
    public function index()
    {
    	$category = Category::where('parent_id', 0)->get();
    	$product = DB::table('products')->orderBy('id', 'DESC')->skip(0)->take(8)->get();
    	return view('user.pages.homepage', compact('category', 'product'));
    }

    public function productType($id)
    {
    	$parent_id = Category::find($id);
    	$category = Category::where('parent_id', $id)->get();
    	// dd($category);
    	$product = DB::table('products')->where('cate_parent', $id)->orderBy('id', 'DESC')->skip(0)->take(8)->get();
    	return view('user.pages.product_type', compact('parent_id', 'category', 'product'));
    }

    public function productDetail($id)
    {
    	$product = Product::find($id);
        $size = Size::all();
    	$img_detail = Image::where('product_id', $id)->get();
    	$relate_product = Product::where('id', '<>', $id)->get();
        $comment = Comment::where('product_id', $id)->get();
    	return view('user.pages.product_detail', compact('product', 'img_detail', 'relate_product', 'size', 'comment'));
    }

    public function comment(Request $request, $id)
    {
        $data = $request->all();
        $data['product_id'] = $id;
        $comment = Comment::create($data);
        return back();
    }

    public function getContact()
    {
    	return view('user.pages.contact');
    }

    public function postContact(Request $request)
    {
   		$email = $request->get('email');
    	$content = $request->get('msg');
    	\Mail::to($email)->send(new ContactMail($content, $email));
    	return redirect()->route('getContact');
    }

    public function search(Request $request)
    {
        $result = $request->search;
        $result = str_replace(' ', '%', $result);
        $data = Product::where('name', 'like', '%'.$result.'%')->orWhere('price', $result)->get();
        return view('user.pages.search',compact('data', 'result'));
    }

    
}
