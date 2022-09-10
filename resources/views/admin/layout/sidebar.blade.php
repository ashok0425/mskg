<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ __setLink('admin/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        
        </div>
        <div class="sidebar-brand-text mx-3"><img src="{{ asset('logo.png') }}" alt="" width="60"></div>
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
    <li class="nav-item {{Request::segment(2)=='categories'?'active':''}}">
        <a class="nav-link" href="{{route('admin.categories.index')}}">
        <i class="fas fa-seedling"></i>
        <span>Category</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='menus'?'active':''}}">
        <a class="nav-link" href="{{route('admin.menus.index')}}">
        <i class="fas fa-utensils"></i>
        <span>Menu</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='today'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.today')}}">
        <i class="fas fa-pager"></i>
        <span>Today Order</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='itemsell'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.itemsell')}}">
        <i class="fas fa-pager"></i>
        <span>Today Sold Category</span></a>
    </li>
   

    <li class="nav-item {{Request::segment(2)=='rooms'?'active':''}}">
        <a class="nav-link" href="{{route('admin.rooms.index')}}">
        <i class="fas fa-home"></i>
        <span>Room/Table</span></a>
    </li>

    <li class="nav-item {{Request::segment(2)=='today-expenses'?'active':''}}">
        <a class="nav-link" href="{{route('admin.expenses.today')}}">
        <i class="fas fa-copy"></i>
        <span>Today Expenses</span></a>
    </li>



    <li class="nav-item {{Request::segment(2)=='expenses'?'active':''}}">
        <a class="nav-link" href="{{route('admin.expenses.index')}}">
        <i class="fas fa-copy"></i>
        <span>Expenses</span></a>
    </li>

    <li class="nav-item {{Request::segment(2)=='opening_balance'?'active':''}}">
        <a class="nav-link" href="{{route('admin.opening.balance')}}">
        <i class="fas fa-copy"></i>
        <span>Opening Balances</span></a>
    </li>


    <li class="nav-item {{Request::segment(2)=='orders'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.index')}}">
        <i class="fas fa-copy"></i>
        <span>ALL Sell & Report</span></a>
    </li>
    <li class="nav-item {{Request::segment(2)=='chart'?'active':''}}">
        <a class="nav-link" href="{{route('admin.orders.chart')}}">
        <i class="fas fa-chart-bar"></i>
        <span>Report in chart</span></a>
    </li>

    <li class="nav-item {{Request::segment(2)=='profile'?'active':''}}">
        <a class="nav-link" href="{{route('admin.profile')}}">
        <i class="fas fa-user"></i>
        <span>Profile</span></a>
    </li>

    @if (__getAdmin()->id ==3)
        
    <li class="nav-item {{Request::segment(2)=='code'?'active':''}}">
        <a class="nav-link" href="{{route('admin.code')}}">
        <i class="fas fa-user"></i>
        <span>Code</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>