<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderDetail;
use Cart;

class OrderController extends Controller
{
    public function index(Request $request)
    {
    	$order = DB::table('orders');
        if($request->search) {
            $order = $order->where('name', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('address', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('status', 'LIKE', '%'.$request->search.'%');
        }
        $order = $order->where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
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
