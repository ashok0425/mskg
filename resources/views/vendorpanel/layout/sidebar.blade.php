<nav id="sidebar" class="sidebar" style="overflow-y: visible!important">
    <div class="sidebar-content js-simplebar">
        @php
            $logo=DB::table('websites')->value('image');
        @endphp
        <a class="sidebar-brand" href="{{ route('vendor.dashboard') }}">
  <span class="align-middle"><img src="{{ asset($logo) }}" alt="" width="80"></span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?php  echo PAGE=='dashboard'?'active':'' ?>">
                <a class="sidebar-link" href="{{ route('vendor.dashboard') }}">
      <i class="fas fa-wallet"></i> <span class="align-middle">Dashboard</span>
    </a>
            </li>
            
           
            <li class="sidebar-item <?php  echo PAGE=='profile'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('vendor.profile')}}">
      <i class="fas fa-user" ></i> <span class="align-middle">Profile</span>
    </a>
            </li>
      
            <li class="sidebar-item <?php  echo PAGE=='coupon'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('vendor.coupon')}}">
      <i class="fas fa-copy" ></i> <span class="align-middle">Coupon</span>
    </a>
            </li>

            <li class="sidebar-header">
                Manage Shop
            </li>

            <li class="sidebar-item <?php  echo PAGE=='shop'?'active':'' ?>">
                <a data-target="#shop" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
  <i class="fas fa-store"></i> <span class="align-middle">Shop List</span>
    </a>
                <ul id="shop" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='shop'?'show':'' ?>" data-parent="#sidebar" style="">
               
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.shop.create')}}">Add Shops</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.shop')}}">All Shop</a></li>
                  
                   
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
               
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.product.create')}}">Add Product</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.product')}}">All Products</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.deactiveproduct')}}">Deactivate Products</a></li>
                   
                </ul>
            </li>

            <li class="sidebar-header">
               Product Customization & Report
            </li>

            <li class="sidebar-item <?php  echo PAGE=='customization'?'active':'' ?>">
                <a data-target="#customization" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
  <i class="fas fa-male"></i> <span class="align-middle">Customization & Report</span>
    </a>
                <ul id="customization" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='customization'?'show':'' ?>" data-parent="#sidebar" style="">
               
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.customize')}}">Product Customization List </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.report')}}">Product Report</a></li>
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
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.order.new')}}">New Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.order.processing')}}">Order in Process</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.order.shipping')}}">Shipped Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.order.deliver')}}">Delivered Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.order.cancel')}}">Cancelled Order</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.order.all')}}">All Order</a></li>
                 </ul>
             </li>

             <li class="sidebar-header">
                Transcation & Ticket
             </li>
 
             <li class="sidebar-item <?php  echo PAGE=='account'?'active':'' ?>">
                 <a data-target="#account" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
   <i class="fas fa-dollar-sign"></i> <span class="align-middle">Account & Payment</span>
     </a>
                 <ul id="account" class="sidebar-dropdown list-unstyled collapse <?php  echo PAGE=='account'?'show':'' ?>" data-parent="#sidebar" style="">
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.payment')}}">Payment History</a></li>
                    
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.ticket')}}">Ticket</a></li>
                     <li class="sidebar-item"><a class="sidebar-link" href="{{route('vendor.ticket.create')}}">Create Ticket</a></li>
                 </ul>
             </li>





             <li class="sidebar-header">
              General
             </li>
 
             <li class="sidebar-item <?php  echo PAGE=='contactlist'?'active':'' ?>">
                <a class="sidebar-link" href="{{route('vendor.contactlist')}}">
      <i class="align-middle" data-feather="user"></i> <span class="align-middle">Contact List</span>
    </a>
            </li>

             
        </ul>
    </div>
</nav>