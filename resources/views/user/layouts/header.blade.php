
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
                    <a href="{{ route('getLogin') }}" class="flex-c-m trans-04 p-lr-25">
                    Đăng kí
                    </a>
                    <a href="{{ route('getRegister') }}" class="flex-c-m trans-04 p-lr-25">
                    Đăng nhập
                    </a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                    USD
                    </a>
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->		
                <a href="#" class="logo">
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
                            <ul class="sub-menu">
                                <?php
                                    $sub_menu = DB::table('categories')->where('parent_id', $menu->id)->get();
                                ?>
                                @foreach($sub_menu as $item)
                                <li><a href="index.html">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li class="label1" data-label1="hot">
                            <a href="shoping-cart.html">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="bor17 of-hidden pos-relative">
                        <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

                        <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>               
            </nav>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15" style="width: 960px; margin: 0 auto;">
                <div class="bor17 of-hidden pos-relative">
                    <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

                    <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </div>
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
                <ul class="sub-menu-m">
                @foreach($sub_menu as $item)
                    <li><a href="index.html">{{ $item->name }}</a></li>
                @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="user/images/icons/icon-close2.png" alt="CLOSE">
            </button>
            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
