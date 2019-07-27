@extends('user.layouts.master')
@section('content')	

    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="user/images/banner-01.jpg" alt="IMG-BANNER">
                        <a href="{{ route('product-type', 2) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                Women
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                Spring 2018
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="user/images/banner-02.jpg" alt="IMG-BANNER">
                        <a href="{{ route('product-type', 1) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                Men
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                Spring 2018
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="user/images/banner-03.jpg" alt="IMG-BANNER">
                        <a href="{{ route('product-type', 3) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                Sale
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                Sale Off
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    {{ $parent_id->name }}
                    </button>
                    @foreach($category as $cate)
	                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $cate->id }}">
	                    {{ $cate->name }}
	                    </button>
                    @endforeach
                </div>
                <div class="flex-w flex-c-m m-tb-10 flex-r-m wrap-icon-header">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>
                    <div class="bor17 of-hidden pos-relative">
						<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

						<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
					</div>
                </div>
                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>
                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                    </a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>
                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                    </a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                    </a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row isotope-grid">
            @foreach($product as $item)	
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->category_id }}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                        	<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                            <img src="upload/{{ $item->image }}" alt="IMG-PRODUCT" height="350px">
                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <h5>{{ $item->name }}</h5>
                                </a>
                                <span class="stext-105 cl3">
                                {{ $item->price }} VNĐ
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                            	<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
	                              	<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
				                        <i class="zmdi zmdi-shopping-cart"></i>
				                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            
            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
                </a>
            </div>
        </div>
    </section>
@endsection