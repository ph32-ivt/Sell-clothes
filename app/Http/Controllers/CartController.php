<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckOutRequest;
use Cart;
use App\Product;
use App\Promotion;
use App\Size;
use App\Order;
use App\OrderDetail;
use Mail;

class CartController extends Controller
{
    public function getaddCart(Request $request, $id)
    {
    	// $product = Product::with('promotions')->find($id);
    	$product = Product::find($id);
    	$promotion = Promotion::find($id);
    	if ($request->qty) {
    		$qty = $request->qty;
    	} else {
    		$qty = 1;
    	}

    	// if ($promotion->code != null) {
    	// 	$price = $price * $promotion->code;
    	// } else {
    	// 	$price = $product->price;
    	// }

    	if ($request->size) {
    		$size = $request->size;
    	} else {
    		$size = 'S';
    	}

    	$cart = ['id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'weight' => 550, 'options' => ['size' => $size, 'image' => $product->image]];
    	Cart::add($cart);
    	// dd(Cart::content());
    	return redirect()->back();
    }

    public function postaddCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	if ($request->qty) {
    		$qty = $request->qty;
    	} else {
    		$qty = 1;
    	}

    	if ($request->size) {
    		$size = $request->size;
    	} else {
    		$size = 'S';
    	}

    	$cart = ['id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'weight' => 550, 'options' => ['size' => $size, 'image' => $product->image]];
    	Cart::add($cart);
    	return redirect()->back();
    }	

    public function viewCart()
    {
    	$cart = Cart::content();
    	$size = Size::all();
    	return view('user.pages.listcart', compact('cart', 'size'));
    }

    public function getUpdateCart(Request $request)
    {
    	Cart::update($request->rowId, $request->qty);
    }

    public function deleteCart($id)
    {
    	Cart::remove($id);
    	return redirect()->back();
    }

    public function checkout()
    {
    	$cart = Cart::content();
    	$total = Cart::total();
    	return view('user.pages.checkout', compact('cart', 'total'));
    }

    public function postCheckout(CheckOutRequest $request)
    {
    	// Insert data to Order table
    	$data['infor'] = $request->all();
    	$order = Order::create($data['infor']);

    	// Insert data to OrderDetail Table
    	$order_id = $order->id;
    	foreach (Cart::content() as $cart) {
    		$order_detail = OrderDetail::create([
    			'quantity' => $cart->qty,
    			'price' => $cart->price,
    			'size' => $cart->options->size,
    			'order_id' => $order_id,
    			'product_id' => $cart->id
    		]);
    	}

    	// Send email to customer
    	$email = $request->email;
    	$name = $request->name;
    	$data['cart'] = Cart::content();
    	$data['total'] = Cart::total();
    	Mail::send('mail.checkout_complete', $data, function($message) use ($email, $name) {
    		$message->from('longjinhofc@gmail.com', 'Ngọc Long');
    		$message->to($email, $name);
    		$message->subject('Xác nhận hóa đơn mua hàng Shop.com');
    	});
    	Cart::destroy();
    	return redirect()->back()->with(['type_message' => 'success', 'flash_message' => 'Bạn đã đặt hàng thành công !']);
    }
}
