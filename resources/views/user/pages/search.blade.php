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
                <h3>
                    Kết quả tìm kiếm với từ khóa: <span style="color: blue;">{{ $result }}</span>
                </h3>
                <p style="margin: 10px 0">Tìm thấy {{ count($data) }} sản phẩm</p>
            </div>
            <div class="row isotope-grid">
            @foreach($data as $item)	
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->cate_parent }}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                            <a href="{{ route('product-detail', $item->id) }}">
                                <img src="upload/{{ $item->image }}" alt="IMG-PRODUCT" height="350px">
                            </a>   
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('product-detail', $item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <h5>{{ $item->name }}</h5>
                                </a>
                                <span class="stext-105 cl3">
                                {{ number_format($item->price) }} VNĐ
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="{{ route('getaddCart', $item->id) }}" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                        <a href="{{ route('getaddCart', $item->id) }}"><i class="zmdi zmdi-shopping-cart"></i></a>
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