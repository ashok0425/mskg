<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle d-flex">
<i class="hamburger align-self-center"></i>
</a>
          {{-- fetching all pending order  --}}

          @php
    $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',0)->orderBy('order_details.id','desc')->get();
@endphp
        
    
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="{{ route('/') }}" >
                    <div class="position-relative">
                        <i class="fas fa-globe"></i>
                    </div>
                </a></li>

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown" title="order list">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="bell"></i>
                        <span class="indicator"> {{ count($order) }}</span>
                    </div>
                </a>
      
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown" style="max-height: 350px;overflow-Y:scroll;">
                    <div class="dropdown-menu-header">
                        {{ count($order) }} New order
                    </div>
                    <div class="list-group">
                        @foreach ($order as $item)
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">{{ $item->name }}</div>
                                    <div class="text-muted small mt-1">{{ $item->price }}</div>
                                    <div class="text-muted small mt-1">{{ carbon\carbon::parse($item->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        @endforeach
                      
                       
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{ route('vendor.order.new') }}" class="text-muted">Show all pending order</a>
                    </div>
                </div>
            </li>
            
            <?php 
            $msg=DB::table('contactvendors')->join('users','users.id','contactvendors.user_id')->where('vendor_id',Auth::user()->id)->where('users.status',0)->orderBy('contactvendors.id','desc')->get();
            ?>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown" title="contact list">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="message-square"></i>

                        <span class="indicator"> {{ count($msg) }}</span>
                    </div>
                    
                </a>

                {{-- fetching all unreplied message  --}}


                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown" style="max-height: 350px;overflow-Y:scroll;">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            {{ count($msg) }} New Messages
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach ($msg as $item)
                        <a href="{{route('vendor.contactlist')}}" class="list-group-item">
                            <div class="row g-0 align-items-center">
                               
                                <div class="col-10 pl-2">
                                    <div class="text-dark">{{ $item->name }}</div>
                                    <div class="text-muted small mt-1">{{ Str::limit($item->message, 40, '...') }}</div>
                                    <div class="text-muted small mt-1">{{ carbon\carbon::parse($item->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>    
                        @endforeach
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{route('vendor.contactlist')}}" class="text-muted">Show all messages</a>
                    </div>
                </div>
            </li>
@php
         $product=DB::table('productcustomizes')->join('users','users.id','productcustomizes.user_id')->join('products','products.id','productcustomizes.product_id')->select('productcustomizes.*','products.name as pname','products.id as pid','users.name as uname','users.email as uemail','users.id as uid')->where('productcustomizes.vendor_id',Auth::user()->id)->orderBy('productcustomizes.id','desc')->where('productcustomizes.status',0)->get();

@endphp
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown" title="Product customization request">
                    <div class="position-relative">
                        <i class="fab fa-accusoft" ></i>
                        <span class="indicator"> {{ count($product) }}</span>
                    </div>
                </a>
      
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown" style="max-height: 350px;overflow-Y:scroll;">
                    <div class="dropdown-menu-header">
                        {{ count($product) }} New product customization
                    </div>
                    <div class="list-group">
                        @foreach ($product as $item)
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">{{ $item->pname }}</div>
                                 
                                    <div class="text-muted small mt-1">{{ carbon\carbon::parse($item->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        @endforeach
                      
                       
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{ route('vendor.customize') }}" class="text-muted">Show all pending query</a>
                    </div>
                </div>
            </li>




            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
    <i class="align-middle" data-feather="settings"></i>
  </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
    <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->name }}</span>
  </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('vendor.profile') }}"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('vendor.profile') }}"><i class="fas fa-cog"></i> Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-power-off"></i> Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>