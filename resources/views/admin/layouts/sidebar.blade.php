
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Shop Admin </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tổng quan</span></a>
    </li>

    <!-- Heading -->
    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('category-list') }}" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Categories</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category-list') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý Danh mục</span></a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('product-list') }}" data-toggle="collapse"  aria-expanded="true">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Products</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('product-list') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý Sản phẩm</span></a>
    </li>
    <!-- Divider -->
    <!-- Heading -->
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user-list') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Quản lý Người dùng</span></a>
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('order-list') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý Đơn hàng</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('slide-list') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Quản lý Slide</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>