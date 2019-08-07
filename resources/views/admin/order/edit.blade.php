@extends('admin.layouts.master')
@section('content')
	<h1 class="h3 mb-2 text-gray-800 text-center" style="padding-bottom: 20px;">Chi tiết Đơn hàng</h1>
	<section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-md-4"><h4>Thông tin khách hàng</h4></th>
                                    <th class="col-md-6"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    <td>{{ $order->name }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $order->telephone }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>{{ $order->note }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Giá tiền (VNĐ)</th>
                            </thead>
                            <tbody>
                            	<?php  $total = 0; $stt = 1 ?>
                            @foreach($order_detail as $key => $bill)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $bill->product->name }}</td>
                                    <td>
                                    	<img src="upload/{{ $bill->product->image }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $bill->quantity }}</td>
                                    <td>{{ $bill->size }}</td> 
                                    <td>{{ number_format($bill->price) }}</td>
                                </tr>
                                <?php
                                	$sub_total = $bill->quantity * $bill->price;
                                	$stt++;
                                ?>
                                <?php $total += $sub_total; ?>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-center"><b>Tổng tiền</b></td>
                                <td colspan="1"><b style="color: red">{{ number_format($total) }} VNĐ</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                <form action="{{ route('order-update', $order->id) }}" method="POST">
                    
                    {{ csrf_field() }}
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <label><strong>Trạng thái giao hàng: </strong></label>
                            <select name="status" class="form-control input-inline" style="width: 200px; margin: 20px 20px">
                                <option value="Chưa giao">Chưa giao</option>
                                <option value="Đang giao">Đang giao</option>
                                <option value="Đã giao">Đã giao</option>
                            </select>

                            <input type="submit" value="Xử lý" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection