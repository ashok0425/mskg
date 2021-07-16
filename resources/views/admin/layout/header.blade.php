<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle d-flex">
<i class="hamburger align-self-center"></i>
</a>
          {{-- fetching all pending order  --}}

          @php
          $order=DB::table('orders')->where('status',0)->get();
      @endphp
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="" id="messagesDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="fas fa-globe"></i>
                    </div>
                </a></li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
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
                        <a href="{{route('admin.order.show',['id'=>$item->id])}}" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">{{ $item->tracking_code }}</div>
                                    <div class="text-muted small mt-1">{{ $item->total }}</div>
                                    <div class="text-muted small mt-1">{{ carbon\carbon::parse($item->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                      
                       
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{ route('admin.order.new') }}" class="text-muted">Show all pending order</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="message-square"></i>
                    </div>
                </a>

                {{-- fetching all unreplied message  --}}

                <?php 
                $msg=DB::table('contacts')->where('status',0)->get();
                ?>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown" style="max-height: 350px;overflow-Y:scroll;">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            {{ count($msg) }} New Contact Messages
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach ($msg as $item)
                        <a href="{{route('admin.contact')}}" class="list-group-item">
                            <div class="row g-0 align-items-center">
                               
                                <div class="col-10 pl-2">
                                    <div class="text-dark">{{ $item->fname . $item->lname }}</div>
                                    <div class="text-muted small mt-1">{{ Str::limit($item->msg, 40, '...') }}</div>
                                    <div class="text-muted small mt-1">{{ carbon\carbon::parse($item->created_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>    
                        @endforeach
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{route('admin.contact')}}" class="text-muted">Show all messages</a>
                    </div>
                </div>


            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="fas fa-envelope"></i>
                    </div>
                </a>

                {{-- fetching all unreplied message  --}}

                @php
                $coupon=DB::table('vendorcoupons')->join('users','users.id','vendorcoupons.vendor_id')->select('vendorcoupons.*','users.name as uname','users.phone','users.id as uid')->where('vendorcoupons.Isapproved',null)->orderBy('id','desc')->get();
            @endphp

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown" style="max-height: 350px;overflow-Y:scroll;">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            {{ count($coupon) }} New Coupon 
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach ($coupon as $item)
                        <a href="{{route('admin.vendor.newcoupon')}}" class="list-group-item">
                            <div class="row g-0 align-items-center">
                               
                                <div class="col-10 pl-2">
                                    <div class="text-dark">{{ $item->uname}}</div>
                                    <div class="text-muted small mt-1">{{ $item->coupon }}</div>
                                    <div class="text-muted small mt-1">{{ $item->price }}%</div>
                                </div>
                            </div>
                        </a>    
                        @endforeach
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{route('admin.vendor.newcoupon')}}" class="text-muted">Show all coupon</a>
                    </div>
                </div>


            </li>






            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
    <i class="align-middle" data-feather="settings"></i>
  </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
    <img src="{{ asset(__getAdmin()->profile_photo_path) }}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">{{ __getAdmin()->name }}</span>
  </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fas fa-cog"></i> Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-power-off"></i> Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>