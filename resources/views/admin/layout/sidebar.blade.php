<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ __setLink('admin/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        
        </div>
        <div class="sidebar-brand-text mx-3"><img src="{{ asset('logo.png') }}" alt="" width="180"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::segment(2)=='dashboard'?'active':''}}">
        <a class="nav-link" href="{{route('admin.carts.create')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Dashboard
    </div> -->

    <li class="nav-item {{Request::segment(2)=='menu'?'active':''}}">
        <a class="nav-link" href="{{route('admin.menus.index')}}">
        <i class="fas fa-folder-minus"></i>
        <span>Menu</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='page'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.today')}}">
        <i class="fas fa-pager"></i>
        <span>Today Order</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='page'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.itemsell')}}">
        <i class="fas fa-pager"></i>
        <span>Today Sold Item</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='page'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.index')}}">
        <i class="fas fa-copy"></i>
        <span>ALL Sell & Report</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='page'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.chart')}}">
        <i class="fas fa-chart-bar"></i>
        <span>Report in chart</span></a>
    </li>

    <li class="nav-item {{Request::segment(2)=='page'?'active':''}}">
        <a class="nav-link" href="{{route('admin.profile')}}">
        <i class="fas fa-user"></i>
        <span>Profile</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>