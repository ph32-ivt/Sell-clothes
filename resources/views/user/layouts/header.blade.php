
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
                <div class="right-top-bar flex-w h-full">
                @if(Auth::check())
                    <a href="" class="flex-c-m trans-04 p-lr-25">Chào bạn {{ Auth::user()->name }}</a>
                    <a href="{{ route('getLogout') }}" class="flex-c-m trans-04 p-lr-25">Đăng xuất</a>
                @else
                    <a href="{{ route('getRegister') }}" class="flex-c-m trans-04 p-lr-25">
                    Đăng kí
                    </a>
                    <a href="{{ route('getLogin') }}" class="flex-c-m trans-04 p-lr-25">
                    Đăng nhập
                    </a>
                @endif
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->		
                <a href="{{ route('homepage') }}" class="logo">
                <img src="user/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{ route('homepage') }}">Trang chủ</a>
                        </li>
                        <?php
                            $menu_level = DB::table('categories')->where('parent_id', 0)->get();
                        ?>
                        @foreach($menu_level as $menu)
                        <li>
                            <a href="{{ route('product-type', $menu->id) }}">{{ $menu->name }}</a>
                        </li>
                        @endforeach
                        <li>
                            <a href="{{ route('getContact') }}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <form action="{{ route('search') }}" method="POST">
                        <div class="bor17 of-hidden pos-relative">
                            <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Nhập từ khóa..." id="proList" style="overflow: auto;">
                            <div id="hint"></div>

                            <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </div>
                        {{ csrf_field() }}
                    </form>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <!-- Cart -->

                    <div class="wrap-header-cart js-panel-cart">
                        <div class="s-full js-hide-cart"></div>
                        <div class="header-cart flex-col-l p-l-65 p-r-25">
                            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                                <span class="mtext-103 cl2">
                                Your Cart
                                </span>
                                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                                    <i class="zmdi zmdi-close"></i>
                                </div>
                            </div>
                            <div class="header-cart-content flex-w js-pscroll">
                            <?php
                                $carts = Cart::content();
                            ?>
                                <ul class="header-cart-wrapitem w-full">
                                    
                                    @foreach($carts as $cart)
                                    <li class="header-cart-item flex-w flex-t m-b-12" style="border-bottom: 1px solid #D1D5F5">
                                        <div class="header-cart-item-img">
                                            <img src="upload/{{ $cart->options->image }}" alt="IMG">
                                        </div>
                                        <div class="header-cart-item-txt p-t-8">
                                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            {{ $cart->name }}
                                            </a>
                                            <span class="header-cart-item-info">
                                            {{ $cart->qty }} x {{ number_format($cart->price) }} VND
                                            </span>
                                            <span class="header-cart-item-info">
                                                Size : {{ $cart->options->size }}
                                            </span>
                                            <a style="float: right; margin-right: 50px; margin-top: -80px" href="{{ route('deleteCart', $cart->rowId) }}"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                                <div class="w-full">
                                    <div class="header-cart-total w-full p-tb-40">
                                        <?php $total = Cart::total() ?>
                                        Total: {{ $total }} VND
                                    </div>
                                    <div class="header-cart-buttons flex-w w-full">
                                        <a href="{{ route('viewCart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                        View Cart
                                        </a>
                                        <a href="{{ route('form-checkout') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                        Check Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>

                </div>               
            </nav>

        </div>
    </div>
    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="index.html"><img src="user/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>
        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
            <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>
        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>
            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                    Đăng kí
                    </a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                    Đăng nhập
                    </a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                    USD
                    </a>
                </div>
            </li>
        </ul>
        <ul class="main-menu-m">
            <li>
                <a href="index.html">Trang chủ</a>
                
                <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            @foreach($menu_level as $menu)
            <li>
                <a href="product.html">{{ $menu->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</header>

<!--////////////////////////////////////////////////////////////////////////-->


