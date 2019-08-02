@extends('user.layouts.master')
@section('content')
	<style>
		.button {
			padding: 8px 15px;
			background: #fff;
			color: #000;
		}
	</style>
	<script type="text/javascript">
		function updateCart(qty, rowId) {
			$.get(
				'cart/update',
				{qty:qty, rowId:rowId},
				function() {
					location.reload();
				}
			);
		}
	</script>
	<div class="container-wrap">
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
					Trang chủ
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					Giỏ hàng
				</span>
			</div>
		</div>

		<div class="col-lg-12">
	        @if (Session::has('flash_message'))
	            <div class="alert alert-{{ Session::get('type_message') }}">
	                {{ Session::get('flash_message') }}
	            </div>
	        @endif
	    </div>
			

		<!-- Shoping Cart -->
		<form class="bg0 p-t-75 p-b-85">
			<div class="container">
				<div class="row">
					@if(Cart::count() > 0)
					<div class="col-lg-11">
						<div class="m-l-25 m-r--38 m-lr-0-xl">
							<div class="wrap-table-shopping-cart">
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th scope="col" class="text-center">Hình ảnh</th>
										<th scope="col" class="text-center">Tên sản phẩm</th>
										<th scope="col" class="text-center">Giá</th>
										<th scope="col" class="text-center">Số lượng</th>
										<th scope="col" class="text-center">Chỉnh sửa</th>
									</tr>
								@foreach($cart as $item)
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="upload/{{ $item->options->image }}" alt="IMG">
											</div>
										</td>
										<td class="column-1">{{ $item->name }} - {{ $item->options->size }}</td>
										<td class="column-1">{{ number_format($item->price) }} VND</td>
										<td class="column-1">
											<div class="wrap-num-product flex-w m-l-auto m-r-0 qty" style="margin-left: 50px">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="{{ $item->qty }}" onchange="updateCart(this.value, '{{ $item->rowId }}')">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-1">
											<a href="{{ route('deleteCart', $item->rowId) }}">
												<i style="font-size: 150%" class="fa fa-trash" aria-hidden="true"></i>
											</a>
										</td>
									</tr>
								@endforeach

								</table>
							</div>

							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
								<div class="flex-w flex-m m-r-20 m-tb-5" style="margin-left: 400px">	
									<strong class="text-center" style="font-size: 130%">TỔNG TIỀN : {{ Cart::total() }} VND</strong>
								</div>
							</div>
							<div class="flex-w">
								<a href="{{ route('form-checkout') }}">
									<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" style="margin: 10px 450px; background: #000; color: #fff">
										ĐI ĐẾN ĐẶT HÀNG
									</div>
								</a>
							</div>
						</div>
					</div>
				@else
					<p>Giỏ hàng rỗng !</p>
				@endif
				</div>
			</div>
		</form>
	</div>
@endsection

