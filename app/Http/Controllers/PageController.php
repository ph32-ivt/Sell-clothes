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
use App\Slide;

class PageController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
    	$category = Category::where('parent_id', 0)->get();
        $product = DB::table('products')->orderBy('id', 'DESC')->paginate(8);
    	return view('user.pages.homepage', compact('category', 'product', 'slides'));
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
        if($result == '') {
            return redirect()->route('homepage');
        } else {
            $data = Product::where('name', 'like', '%'.$result.'%')->orWhere('price', $result)->get();
            return view('user.pages.search',compact('data', 'result'));
        }
        
    }



    // public function load_data(Request $request)
    // {
    //     if($request->ajax()) {
    //         if($request->id > 0)
    //   {
    //     $data = DB::table('products')->where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(4)->get();
    //   }
    //   else
    //   {
    //    $data = DB::table('products')->orderBy('id', 'DESC')->limit(4)->get();
    //   }
    //         $output = '';
    //         $last_id = '';
    //         $id = $request->id;
    //         // $data = DB::table('products')->where('id', '>', $id)->orderBy('id', 'DESC')->limit(4)->get();

    //         if(!$data->isEmpty()) {
    //             foreach ($data as $item)
    //             {
    //                 $output .= ' 
    //                     <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '. $item->cate_parent .'">
    //                         <!-- Block2 -->
    //                         <div class="block2">
    //                             <div class="block2-pic hov-img0">
    //                                 <div class="ribbon-wrapper"><div class="ribbon sale">'. $item->status .'</div></div>
    //                                 <a href="">
    //                                     <img src="upload/'. $item->image .'" alt="IMG-PRODUCT" height="350px">
    //                                 </a>   
    //                             </div>
    //                             <div class="block2-txt flex-w flex-t p-t-14">
    //                                 <div class="block2-txt-child1 flex-col-l ">
    //                                     <a href="" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
    //                                     <h5>'. $item->name .'</h5>
    //                                     </a>
    //                                     <span class="stext-105 cl3">
    //                                     '. number_format($item->price) .' VNĐ
    //                                     </span>
    //                                 </div>
    //                                 <div class="block2-txt-child2 flex-r p-t-3">
    //                                     <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
    //                                         <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
    //                                             <a href=""><i class="zmdi zmdi-shopping-cart"></i></a>
    //                                         </div>
    //                                     </a>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     </div>  
    //                 ';
    //                  $last_id = $item->id;
    //             }
    //             $output .= '
    //                 <div id="load_more" class="flex-c-m flex-w w-full p-t-45">
    //                     <button id="load_more_button" name="load_more_button" data-id="'. $last_id .'" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
    //                     Load More
    //                     </button>
    //                 </div>
    //             ';
                
    //         } else {
    //             $output .= '
    //                 <div id="load_more" class="flex-c-m flex-w w-full p-t-45">
    //                     <button id="load_more_button" name="load_more_button" data-id="'. $last_id .'" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
    //                     No Data Found
    //                     </button>
    //                 </div>
    //             ';
    //         }
    //         echo $output;
    //     }
    // }
    
}
