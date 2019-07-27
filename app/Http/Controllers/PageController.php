<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Image;
use DB;

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
    	$img_detail = Image::where('product_id', $id)->get();
    	$relate_product = Product::where('id', '<>', $id)->get();
    	return view('user.pages.product_detail', compact('product', 'img_detail', 'relate_product'));
    }
}
