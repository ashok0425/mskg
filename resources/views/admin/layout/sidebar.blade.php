<nav id="sidebar" class="sidebar" style="overflow-y: visible!important">
    <div class="sidebar-content js-simplebar">
        @php
            $logo=DB::table('websites')->value('image');
        @endphp
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
  <span class="align-middle"><img src="{{asset('frontend/img/tf-logo.png')}}" class="img-fluid main-logo" width="70"></span>
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
            
          
           
            
            <li class="sidebar-item <?php  echo PAGE=='contact'?'active':'' ?>">
                <a class="sidebar-link" >
      <i class="fas fa-envelope"></i> <span class="align-middle">Package</span>
    </a>
            </li>
        </ul>
    </div>
</nav>