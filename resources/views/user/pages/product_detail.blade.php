@extends('user.layouts.master')
@section('content')
	
	<div class="container-wrap">
		<hr class="margin">
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
					Men
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					{{ $product->name }}
				</span>
			</div>
		</div>
			

		<!-- Product Detail -->
		<section class="sec-product-detail bg0 p-t-65 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="upload/{{ $product->image }}">
										<div class="wrap-pic-w pos-relative">
											<img src="upload/{{ $product->image }}" alt="IMG-PRODUCT" height="500px">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="upload/{{ $product->image }}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
									
									@foreach($img_detail as $image)
									<div class="item-slick3" data-thumb="upload/detail/{{ $image->name }}">
										<div class="wrap-pic-w pos-relative">
											<img src="upload/detail/{{ $image->name }}" alt="IMG-PRODUCT" height="500px">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="upload/detail/{{ $image->name }}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
						
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								{{ $product->name }}
							</h4>

							<span class="mtext-106 cl2">
								{{ number_format($product->price) }} VNĐ
							</span>

							<p class="stext-102 cl3 p-t-23">
								{{ $product->description }}
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<form action="{{ route('postaddCart', $product->id) }}" method="POST">
									@csrf
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="size">
												<option>Choose an option</option>
												@foreach($size as $sz)
												<option value="{{ $sz->name }}">{{ $sz->name }}</option>
												@endforeach
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<a href="{{ route('postaddCart', $product->id) }}"><button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button></a>
									</div>
								</div>	
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="bor10 m-t-50 p-t-43 p-b-40">
					<!-- Tab01 -->
					<div class="tab01">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item p-b-10">
								<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
							</li>

							<li class="nav-item p-b-10">
								
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Bình luận ({{ count($comment) }})</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content p-t-43">
							<!-- - -->
							<div class="tab-pane fade show active" id="description" role="tabpanel">
								<div class="how-pos2 p-lr-15-md">
									<p class="stext-102 cl6">
										{{ $product->description }}
									</p>
								</div>
							</div>

							<!-- - -->
							<div class="tab-pane fade" id="information" role="tabpanel">
								<div class="row">
								</div>
							</div>

							<!-- REVIEW- -->
							<div class="tab-pane fade" id="reviews" role="tabpanel">
								<div class="row">
									<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
										<div class="p-b-30 m-lr-15-sm">
											<!-- Review -->
											<div class="flex-w flex-t p-b-68">
											@foreach($comment as $cm)
												<div class="size-207" style="margin-bottom: 10px;">
													<div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20">
															{{ $cm->name }} 
															<span class="stext-102 cl6">
																{{ date('d/m/Y H:i', strtotime($cm->created_at)) }} 
															</span>
														</span>
													</div>

													<p class="stext-102 cl6" style="margin-top: -5px; margin-left: 25px">
														{{ $cm->content }}
													</p>
												</div>
											@endforeach
											</div>
											
											<!-- Add review -->
											<form class="w-full" action="{{ route('comment', $product->id) }}" method="POST">
												@csrf
												<h5 class="mtext-108 cl2 p-b-7">
													Thêm bình luận :
												</h5>
												<div class="row p-b-25">
													<div class="col-12 p-b-5">
														<label class="stext-102 cl3" for="content">Nội dung</label>
														<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="content"></textarea>
													</div>

													<div class="col-sm-6 p-b-5">
														<label class="stext-102 cl3" for="name">Tên</label>
														<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
													</div>

													<div class="col-sm-6 p-b-5">
														<label class="stext-102 cl3" for="email">Email</label>
														<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="email" name="email">
													</div>
												</div>

												<button type="submit" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
													Submit
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>


		<!-- Related Products -->
		<section class="sec-relate-product bg0 p-t-45 p-b-105">
			<div class="container">
				<div class="p-b-45">
					<h2 class="text-center">
						Sản phẩm liên quan
					</h2>
				</div>

				<!-- Slide2 -->
				<div class="wrap-slick2">
					<div class="slick2">
					@foreach($relate_product as $relate)	
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									@if($relate->status == 'Sale')
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<a href="{{ route('product-detail', $relate->id) }}">
										<img src="upload/{{ $relate->image }}" alt="IMG-PRODUCT" height="300">
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{ route('product-detail', $relate->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											{{ $relate->name }}
										</a>

										<span class="stext-105 cl3">
											{{ number_format($relate->price) }} VNĐ
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="{{ route('getaddCart', $relate->id) }}" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
			                              	<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
						                        <a href="{{ route('getaddCart', $relate->id) }}">
						                        	<i class="zmdi zmdi-shopping-cart"></i>
						                        </a>
						                    </div>
		                                </a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</section>
	</div>


	
@endsection