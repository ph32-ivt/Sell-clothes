@extends('user.layouts.master')
@section('content')
	<style>
		.is-danger {
			color: red;
		}
	</style>
	<div class="container-wrap">
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					Shoping Cart
				</span>
			</div>
		</div>

		<!-- Shoping Cart -->
		<form class="bg0 p-t-75 p-b-85" action="{{ route('postCheckout') }}" method="POST">
			<div class="container">
				<div class="col-lg-12">
			        @if (Session::has('flash_message'))
			            <div class="alert alert-{{ Session::get('type_message') }}">
			                {{ Session::get('flash_message') }}
			            </div>
			        @endif
			    </div>
				<div class="row">
					@if (Cart::count() > 0)
						@csrf
						@method('POST')
						<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
							<div class="m-l-25 m-r--38 m-lr-0-xl">
								<div class="">
									<h3 class="text-center" style="margin-bottom: 30px">THÔNG TIN KHÁCH HÀNG</h3>
									<div class="form-group row" style="margin-bottom: 30px">
									    <label for="" class="col-sm-4 col-form-label">Họ tên *</label>
									    <div class="col-sm-8">
									        <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{ Auth::check() ? Auth::user()->name : old('name') }}">
									        @if($errors->has('name'))
					                            <p class="is-danger">{{ $errors->first('name') }}</p>
					                        @endif
									    </div>
									</div>	
									<div class="form-group row" style="margin-bottom: 30px">
									    <label for="" class="col-sm-4 col-form-label">Email *</label>
									    <div class="col-sm-8">
									        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::check() ? Auth::user()->email : old('email') }}">
									        @if($errors->has('email'))
					                            <p class="is-danger">{{ $errors->first('email') }}</p>
					                        @endif
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 30px">
									    <label for="" class="col-sm-4 col-form-label">Số điện thoại *</label>
									    <div class="col-sm-8">
									        <input type="text" class="form-control" name="telephone" placeholder="Nhập số điện thoại" value="{{ Auth::check() ? Auth::user()->telephone : old('telephone') }}">
									        @if($errors->has('telephone'))
					                            <p class="is-danger">{{ $errors->first('telephone') }}</p>
					                        @endif
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 30px">
									    <label for="" class="col-sm-4 col-form-label">Địa chỉ *</label>
									    <div class="col-sm-8">
									        <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ Auth::check() ? Auth::user()->address : old('address') }}">
									        @if($errors->has('address'))
					                            <p class="is-danger">{{ $errors->first('address') }}</p>
					                        @endif
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 30px">
									    <label for="" class="col-sm-4 col-form-label">Ghi chú</label>
									    <div class="col-sm-8">
									        <textarea class="form-control" name="note" rows="3" value={{ old('note') }}></textarea>
									    </div>
									</div>
									<input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : null }}">
									<input type="hidden" name="status" value="Chưa xử lý">
								</div>
							</div>
						</div>

						<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
							
							<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
							
								<h4 class="mtext-109 cl2 p-b-30">
									ĐƠN HÀNG CỦA BẠN
								</h4>

								<div class="flex-w flex-t bor12 p-b-13">								
								</div>
							
								<div class="flex-w flex-t bor12 p-t-15 p-b-30">
									<ul class="header-cart-wrapitem w-full">
									@foreach($cart as $item)
										<li class="header-cart-item flex-w flex-t m-b-12">
											<div class="header-cart-item-img">
												<img src="upload/{{ $item->options->image }}" alt="IMG">
											</div>

											<div class="header-cart-item-txt p-t-8">
												<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
													{{ $item->name }}
												</a>

												<span class="header-cart-item-info">
													{{ $item->qty }} x {{ number_format($item->price) }} VND
												</span>
												<span class="header-cart-item-info">
	                                                Size : {{ $item->options->size }}
	                                            </span>
	                                            <a style="float: right; margin-right: 20px; margin-top: -80px" href="{{ route('deleteCart', $item->rowId) }}"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
											</div>
										</li>
									@endforeach
									</ul>
								</div>

								<div class="flex-w flex-t p-t-27 p-b-33">
									<div class="size-208">
										<span class="mtext-101 cl2">
											Total:
										</span>
									</div>

									<div class="size-209 p-t-1">
										<span class="mtext-110 cl2">
											{{ $total }} VND
										</span>
									</div>
								</div>

								{{-- <div class="flex-w flex-t p-t-27 p-b-33" style="border-top: 1px dashed #888888">
									<span class="mtext-101 cl2">
										Hình thức thanh toán:
									</span>

									<div class="form-check form-check-inline" style="margin-left: 11px; margin-top: 10px">
						                <input class="form-check-input" type="radio" name="gender" value="option2">
						                <label class="form-check-label" for="">
						                Nhận tiền khi giao hàng
						                </label>
						            </div>
						            <div class="form-check form-check-inline">
						                <input class="form-check-input" type="radio" name="gender" value="option2">
						                <label class="form-check-label" for="">
						                Chuyển khoản (ATM)
						                </label>
						            </div>
								</div> --}}
							
								<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									ĐẶT HÀNG
								</button>
							
							</div>
						</div>
					@else
						<h3 class="text-center" style="margin-left: 200px">Giỏ hàng của bạn rỗng. Vui lòng thêm sản phẩm vào giỏ hàng rồi quay trở lại !</h3>
					@endif
				</div>
			</div>
		</form>
	</div>
	
@endsection