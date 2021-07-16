@extends('frontend.master')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/productinfo.css')}}" />
@section('header')
<section class="section-pagetop bg-gray ">
    <div class="container">
        <h2 class="title-page">My Profile</h2>
    </div> <!-- container //  -->
    </section>
@endsection
 <style>
     /* Style the tab */
.tab {
  float: left;
  background-color: #60c3d3;
  color:white;
  width: 30%;
  /* height: 500px; */

}
.tab  .img{
    border-bottom: 1px solid var(--white);
    padding: 10px;
}
/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
  border-bottom: 1px solid var(--white);

}

/* Change background color of buttons on hover */
.tab .tablinks:hover {
  background-color: var(--white);
  color: #60c3d3!important;
}

/* Create an active/current "tab button" class */
.tab .tablinks.active {
  background-color: white;
  color: #60c3d3!important;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 70%;
  /* height: 500px; */
}
.tabcontent label{
    color: rgb(88, 88, 88);
}
.tabcontent h2{
  color: #60c3d3;
  font-family: var(--font_man);
  font-size: 1.2rem;
  box-shadow: 0 0 10px gray;
  padding: 1rem 0;
  text-align: center;
  margin-bottom: 2rem;
}
.image-input {
	text-aling: center;
}

.image-input input {
	display: none;
}

.image-input label {
	display: block;
	color: #FFF;
	background: #000;
	padding: .3rem .6rem;
	font-size: 115%;
	cursor: pointer;
  max-width: 300px;
}

.image-input label i {
	font-size: 125%;
	margin-right: .3rem;
}

.image-input label:hover i {
	animation: shake .35s;
}

.image-input img {
	max-width: 175px;
	display: none;
}

.image-input span {
	display: none;
	text-align: center;
	cursor: pointer;
}
.image-preview{
  display: none;
}

@keyframes shake {
	0% {
		transform: rotate(0deg);
	}

	25% {
		transform: rotate(10deg);
	}

	50% {
		transform: rotate(0deg);
	}

	75% {
		transform: rotate(-10deg);
	}

	100% {
		transform: rotate(0deg);
	}
}


 </style>
<div class="card w-75 mx-auto my-5 shadow">

<div class="">
    <div class="tab">
        <div class="img">
            <img src="@if(Auth::user()->profile_photo_path==null)  {{asset('frontend/download.webp') }}    @else  {{asset(Auth::user()->profile_photo_path)}} @endif" alt="{{Auth::user()->profile_photo_path}}" width="100" height="100" class="rounded-circle">
            <div class="name">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>
     
         <button class="tablinks " onclick="openprofile(event, 'Profile')" id="defaultOpen" >Profile</button>
        
        <button class="tablinks" onclick="openprofile(event, 'Password')">Change Password</button>
        <button class="tablinks" onclick="openprofile(event, 'appointment')" id="defaultOpen" >My Wishlist</button>
        <button class="tablinks" onclick="openprofile(event, 'Order')">Order History</button>
        <button class="tablinks" onclick="openprofile(event, 'shop')">Favourite Shop</button>

        
        <button class="tablinks" >   <a class="tablinks d-block" href="{{ route('profile.logout') }}">Logout</a></button>
     

      </div>
      
      <div id="Profile" class="tabcontent" >
       
     
              <img src="@if(Auth::user()->profile_photo_path==null)  {{asset('frontend/download.webp') }}    @else  {{asset(Auth::user()->profile_photo_path)}} @endif" alt="{{Auth::user()->profile_photo_path}}" width="100" height="100" class="rounded-circle image">
              <img src=""  width="100" height="100" class="image-preview rounded-circle">
            
            <ul class="list-group list-group-flush">
            
            <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST" >

              @csrf
              <div class="form-group mt-1">
                <div class="image-input">
                  <input type="file" accept="image/*" id="imageInput" name="file">
                  <label for="imageInput" class="image-button"><i class="far fa-image"></i> Upload Profile Picture </label>
                  
                 
                </div>
              </div>
              
              @auth
              @if(Auth::user()->phone!='' && Auth::user()->Isvendor ==null)
       <p class="text-danger mb-0 pb-0 pt-0 pb-1 font-weight-bold">Your Vendor Request  is in review</p>
      
              @endif
      
              @endauth
              <li class="list-group-item">Full name: <input type="text" name="name" id="" value="{{Auth::user()->name}}" required class="form-control"> </li>

              <li class="list-group-item">Email Address: <input type="email" value="{{Auth::user()->email}}" required class="form-control" name="email"> </li>
               <li class="list-group-item">Registered on: {{carbon\carbon::parse(Auth::user()->created_at)->format('d F Y')}} </li> 

        </ul>
            

    
  
 
      



            <div class="sv-product-info-checkout mt-2">

                <input type="submit"  value="Update Profile">

                <input type="hidden"  value="Add profile photo">

            </div>
     
          </form>
           
              
          
          </div>
          
  
   
    
      <div id="Password" class="tabcontent">
       
        <div class="row pt-3">
          <div class="col-md-6 offset-md-2">
            <form method="POST" action="{{ route('profile.password') }}">
              @csrf
          
                  <div class="form-group">
                  <label>Current Password</label>
                     <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="currentpassword" value="{{ $oldpass ?? old('currentpassword') }}" required placeholder="old password">
                  </div> <!-- form-group// -->
                  <div class="form-group">
                  <label>New Password</label>
  
                      <input id="password" type="password" class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}" name="newpassword" required placeholder="new password">
                  </div> <!-- form-group// -->
                  <div class="form-group">
                  <label>Confirm Password</label>
  
                      <input id="password-confirm" type="password" class="form-control" name="confirmpassword" required placeholder="Confirm password">
                    </div> <!-- form-group// -->
                 
                 
                  <div class="form-group text-center sv-product-info-checkout mt-2 d-block">
                      <input type="submit" value="Update Password "> 
                  </div> <!-- form-group// -->   
          </form> 
          </div>
        </div>
  
            </div>
{{-- wishlst section tab --}}
@php
     $wish = DB::table('wishlists')->join('products','wishlists.product_id','products.id')->select('wishlists.*','products.name','products.image','products.id as pid','products.price_after_comission')->where('wishlists.user_id',Auth::user()->id)->orderBy('id','desc')->limit('5')->get();
@endphp
<div id="appointment" class="tabcontent " >  
<table id="myTable" class="table table-responsive-sm" >
  <thead>
      <tr>
          <th>#</th>
          <th>Product</th>
          <th>Image</th>
          <th>Price {{ __getPriceunit() }}</th>
          <th>Action</th>
  
      </tr>
  </thead>
  <tbody>

@foreach ($wish as $item)
    
  <tr>
    <td>{{ $loop->iteration }}</td>

    <td>{{ $item->name }}</td>
    <td><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid" width="70"></td>
<td>{{ $item->price_after_comission }}</td>
    <td class="text-right"> 
      <a data-original-title="Save to Wishlist" title="add to cart" href="{{ route('addbacktocart',['id'=>$item->pid]) }}" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-shopping-cart"></i></a> 
      <a href="{{ route('wishlistremove',['id'=>$item->id]) }}" class="btn btn-light"> Remove</a>
      </td>
  </tr>
@endforeach

</tbody>


</table>



             <div class="checkout_btn1 text-center mb-3">
              <a href="{{ route('wishlist') }} " class="text-center btn btn-info">View All</a>

             </div>
              
            </div>




      
      {{-- order section tab  --}}
      <div id="Order" class="tabcontent " >  @php
            if(Auth::check()){
              $order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','desc')->limit(5)->get();
            
          }
      @endphp
                 <table id="myTable" class="table table-responsive-sm" >
                    <thead>
                        <tr>
                            <th>#</th>
        
                            <th>Date</th>
                            <th>Tracking ID</th>
                            <th>Total Price  ({{ __getPriceunit() }})</th>
                            <th>Payment Method</th>
                          
                            <th>Status</th>
                            <th>Action</th>
        
          
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($order as $item)
                            <tr> 
                                <td>{{$loop->iteration}}</td>
                                <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                                <td>{{$item->tracking_code}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->payment_type}}</td>
        
                                <td>
                            @if ($item->status==0)
                            <span class="badge text-white bg-danger">
                                 In review                  
                            </span>
                            @endif
                                    
                            @if ($item->status==1)
                            <span class="badge text-white bg-primary">
                                           Proccessing            
                            </span>
                            @endif
                            @if ($item->status==2)
                            <span class="badge text-white bg-info">
                                  Shipping                     
                            </span>
                            @endif @if ($item->status==3)
                            <span class="badge text-white bg-success">
                                   Delivery                   
                            </span>
                            @endif @if ($item->status==4)
                            <span class="badge text-white bg-danger">
                                   Cancel                    
                            </span>
                            @endif
                                </td>
                               
        <td>
            <a href="{{ route('order.show',['id'=>$item->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
        </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                      </table>
                       <div class="checkout_btn1 text-center mb-3">
                        <a href="{{ route('order') }} " class="text-center">View All</a>

                       </div>
                        
                      </div>
                
   {{-- order section tab  --}}
   <div id="shop" class="tabcontent " >  @php
    if(Auth::check()){
      $shop = DB::table('favourites')->join('shops','shops.id','favourites.shop_id')->where('user_id',Auth::id())->select('favourites.id as fid','shops.*')->orderBy('favourites.id','desc')->limit(5)->get();
    
  }
@endphp
         <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>

                    <th>Date</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Image</th>
                  
                    <th>Action</th>

  
                    
                </tr>
            </thead>
            <tbody>
                
                @foreach ($shop as $item)
                    <tr> 
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->address}}</td>
                        <td><img src="{{asset($item->image)}}" alt="{{$item->image}}" width="70"></td>

                       
<td>
    <a href="{{ route('shop',['id'=>$item->fid,'name'=>$item->name]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
</td>
                    
                    </tr>
                @endforeach
            </tbody>
              </table>
               <div class="checkout_btn1 text-center mb-3">
                <a href="{{ route('shoplist') }} " class="text-center">View All</a>

               </div>
                
              </div>







                    </div>
                </div>
                   
                             
                        
<div style="clear: both"></div>
   
@endsection

@push('scripts')
<script>
  openprofile('event','Profile')
function openprofile(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it

</script>
@endpush



