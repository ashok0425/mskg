<nav id="sidebar" class="sidebar" style="overflow-y: visible!important">
    <div class="sidebar-content js-simplebar">
        @php
            $logo=DB::table('websites')->value('image');
        @endphp
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
  <span class="align-middle"><img src="{{ asset($logo) }}" alt="" width="80"></span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?php  echo PAGE=='dashboard'?'active':'' ?>">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
      <i class="fas fa-wallet"></i><span class="align-middle">Dashboard</span>
    </a>
            </li>
          

            <li class="sidebar-item <?php  echo PAGE=='profile'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('admin.profile')}}">
      <i class="fas fa-user"></i><span class="align-middle">Profile</span>
    </a>
            </li>
            
            <li class="sidebar-item <?php  echo PAGE=='coupon'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('admin.coupon')}}">
      <i class="fas fa-copy" ></i><span class="align-middle">Coupon</span>
    </a>
            </li>
            <li class="sidebar-item <?php  echo PAGE=='add'?'active':'' ?>">
                <a class="sidebar-link" href="{{ route('admin.add') }}">
      <i class="fas fa-envelope"></i><span class="align-middle">Advertisment</span>
    </a>
            </li>
            <li class="sidebar-header">
                Manage Category
            </li>

            <li class="sidebar-item <?php  echo PAGE=='device'?'active':'' ?>">
                <a data-target="#ui" data-toggle="collapse" class="sidebar-link" aria-expanded="false"> <i class="fas fa-shopping-bag"></i> 
       <span class="align-middle">Category </span>
    </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='device'?'show':'' ?>" data-parent="#sidebar" style="">
               
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.category')}}">Category</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.subcategory')}}">Sub Category</a></li>
                    {{-- <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.model')}}">Brand</a></li> --}}
                   
                </ul>
            </li>


            <li class="sidebar-header">
                Manage Product
            </li>

            <li class="sidebar-item <?php  echo PAGE=='product'?'active':'' ?>">
                <a data-target="#product" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
  <i class="fas fa-envelope"></i> <span class="align-middle">Product</span>
    </a>
                <ul id="product" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='product'?'show':'' ?>" data-parent="#sidebar" style="">
               
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.product.create')}}">Add Product</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.product')}}">All Product</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.deactiveproduct')}}">Deactivate Products</a></li>
                   
                </ul>
            </li>


            <li class="sidebar-header">
                Manage Order
             </li>
 
             <li class="sidebar-item <?php  echo PAGE=='order'?'active':'' ?>">
                 <a data-target="#order" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
   <i class="fas fa-plane-departure"></i> <span class="align-middle">Order Tracking</span>
     </a>
                 <ul id="order" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='order'?'show':'' ?>" data-parent="#sidebar" style="">
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.new')}}">New Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.processing')}}">Order in Process</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.shipping')}}">Shipped Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.deliver')}}">Delivered Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.cancel')}}">Cancelled Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.all')}}">All Order</a></li>
                 </ul>
             </li>


             <li class="sidebar-header">
                Vendor Management
             </li>
 
             <li class="sidebar-item <?php  echo PAGE=='vmanagement'?'active':'' ?>">
                 <a data-target="#vmanagement" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
   <i class="fas fa-user"></i> <span class="align-middle">Vendor List</span>
     </a>
                 <ul id="vmanagement" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='vmanagement'?'show':'' ?>" data-parent="#sidebar" style="">
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.vendor.new')}}">New Vendor</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.vendor')}}">All Vendors</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.vendor.membership')}}">Membership</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.vendor.newcoupon')}}">Pending Vendor Coupons</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.vendor.coupon')}}">All Vendor Coupons</a></li>
                 </ul>
             </li>

             <li class="sidebar-header">
                Account Management
             </li>
 
             <li class="sidebar-item <?php  echo PAGE=='account'?'active':'' ?>">
                 <a data-target="#account" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
   <i class="fas fa-user"></i> <span class="align-middle">Account</span>
     </a>
                 <ul id="account" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='account'?'show':'' ?>" data-parent="#sidebar" style="">
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.payment')}}">All Payment History</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.payment.vendor')}}">Vendor Payment History</a></li>
                    
                 </ul>
             </li>




            <li class="sidebar-header">
                Settings
            </li>

            <li class="sidebar-item <?php  echo PAGE=='setting'?'active':'' ?>">
                <a data-target="#setting" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
  <i class="fas fa-cogs"></i> <span class="align-middle">Setting</span>
    </a>
                <ul id="setting" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='setting'?'show':'' ?>" data-parent="#sidebar" style="">
               
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.banner')}}">Banner Setting</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.website')}}">Frontend Setting</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.page')}}">Page Setting</a></li>
                   
                </ul>
            </li>

            <li class="sidebar-header">
                Manage Blog
            </li>

            <li class="sidebar-item <?php  echo PAGE=='blog'?'active':'' ?>">
                <a data-target="#blog" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
  <i class="fas fa-envelope"></i> <span class="align-middle">Blog Category</span>
    </a>
                <ul id="blog" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='blog'?'show':'' ?>" data-parent="#sidebar" style="">
                  <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.blogcategory')}}">Category</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.blog')}}">Blog</a></li>
                 
                 
                   
                </ul>
            </li>
            <li class="sidebar-header">
         General
            </li>
      <li class="sidebar-item <?php  echo PAGE=='faq'?'active':'' ?>">
                <a class="sidebar-link" href="{{ route('admin.faq') }}">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Faq</span>
    </a>
            </li>
            <li class="sidebar-item <?php  echo PAGE=='user'?'active':'' ?>">
                <a class="sidebar-link" href="{{ route('admin.user.list') }}">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">User List</span>
    </a>
            </li>
            
            <li class="sidebar-item <?php  echo PAGE=='subscriber'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('admin.subscriber')}}">
      <i class="align-middle" data-feather="user"></i> <span class="align-middle">Subscriber List</span>
    </a>
            </li>
            
            <li class="sidebar-item <?php  echo PAGE=='contact'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('admin.contact')}}">
      <i class="fas fa-male"></i> <span class="align-middle">Contact List</span>
    </a>
            </li>
        </ul>
    </div>
</nav>