@extends('user.layouts.master')
@section('content')  

<script>
//     $(document).ready(function(){
 
//      var _token = $('input[name="_token"]').val();

//      load_data('', _token);

//      function load_data(id="", _token)
//      {
//       $.ajax({
//        url:"{ route('load_data') ",
//        method:"POST",
//        data:{id:id, _token:_token},
//        success:function(data)
//        {
//         $('#load_more_button').remove();
//         $('#post_data').append(data);
//        }
//       })
//      }

//      $(document).on('click', '#load_more_button', function(){
//       var id = $(this).data('id');
//       $('#load_more_button').html('<b>Loading...</b>');
//       load_data(id, _token);
//      });

//      $.ajaxSetup({ headers: { 'csrftoken' : '{ csrf_token() }}' } });
// });
    
</script>
	<!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($slides as $slide)
                <div class="item-slick1" style="background-image: url(upload/slides/{{ $slide->name }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                {{ $slide->title }}
                                </span>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    {{ $slide->content }}
                                </h2>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
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
                <h1 class=" cl5">
                    SẢN PHẨM MỚI NHẤT
                </h1>
            </div>
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả
                    </button>
                    @foreach($category as $cate)
	                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $cate->id }}">
	                    {{ $cate->name }}
	                    </button>
                    @endforeach
                </div>
            </div>

            <div id="load-data" class="row isotope-grid">
                {{ csrf_field() }}
                @foreach($product as $item)	
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->cate_parent }}">
                        <!- Block2 ->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                @if($item->status == 'Sale')
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
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
            <!- Load more ->
            <div id="load_more" class="flex-c-m flex-w w-full p-t-45">
                <button id="load_more_button" name="load_more_button" data-id="" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Xem thêm
                </button>

            </div>
            <div class="col-md-4" style="margin: 0 auto">
                <div class="row">{{ $product->links() }}</div>
            </div>
        </div>
    </section>
@endsection


