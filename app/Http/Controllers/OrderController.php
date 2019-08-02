<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderDetail;
use Cart;

class OrderController extends Controller
{
    public function index()
    {
    	$order = DB::table('orders')->where('deleted_at', null)->orderBy('id', 'DESC')->get();
    	return view('admin.order.index', compact('order'));
    }

    public function edit($id)
    {
    	$order = Order::where('id', $id)->first();
    	$order_detail = OrderDetail::with('product')->where('order_id', $id)->get();
    	return view('admin.order.edit', compact('order', 'order_detail'));
    }

    public function update(Request $request, $id)
    {
    	$data = $request->all();
    	$order = Order::find($id);
    	$order->update($data);
    	return redirect()->route('order-list');
    }

    public function delete($id)
    {
    	$order = Order::with('order_details')->find($id);
    	$order->softDeletes();
    	return back();
    }
}
