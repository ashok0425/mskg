@extends('vendorpanel.master')
<style>
    h2{
        font-weight: 700;
        font-size: 1.2rem;

    }
    h2 span{
        color: rgb(4, 109, 109);
    }
</style>
@section('content')

@php
    define('PAGE','profile')
@endphp

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Profile</h1>

    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{asset(Auth::user()->profile_photo_path)}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    <h5 class="card-title mb-0">{{Auth::user()->name}}</h5>
                    <div class="text-muted mb-2">Vendor </div>
                    {{-- <form action="{{route('logout')}}" method="POST">
                        @csrf
                    <input type="submit" class="btn btn-danger" value="logout" style="width:200px">
                    </form> --}}


                </div>
                @if (Auth::user()->membership==1)
                    <p class="text-warning">Your request for membership is in review.</p>
                @elseif(Auth::user()->membership==2)
<div class="text-success">You are a member now.</div>

@elseif(Auth::user()->membership==3)
<div class="text-danger">Your request to become a member has been rejected.</div>

                @else 
                <p> Enjoy more sales and features by becoming a member today!</p>
                <a href="{{route('vendor.membership')}}" class="btn btn-success">Apply For membership</a>
                @endif
              

            </div>
            <br/>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                @php
                $totalsale=DB::table('order_details')->where('vendor_id',Auth::user()->id)->sum('price');
                $totalpaid=DB::table('payments')->where('vendor_id',Auth::user()->id)->sum('amount');
            @endphp
            <h2>Total Sale Amount : <span>{{ __getPriceunit() }} {{ $totalsale}}</span> </h2>
            <h2>Paid Amount : <span>{{ __getPriceunit() }} {{ $totalpaid}}</span> </h2>
            <h2>Pending Amount : <span> {{ __getPriceunit() }} {{ $totalsale-$totalpaid}}</span> </h2>
        
        
                <div class="card-header">

                    <h3 class=" mb-0">Update profile</h3>
                </div>
                <div class="card-body">
                  
                    <form action="{{route('vendor.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
<div class="row">
    <div class="col-md-6">
        <div class=" mt-3">
            <div class="file-upload-wrapper" data-text="Select your file!">
            <input name="file" type="file" class="file-upload-field" value="">
          </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mt-2">
            <label>Name</label>
            <input type="text" value="{{Auth::user()->name}}" class="form-control" name="name" required>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Email</label>
            <input type="text" value="{{Auth::user()->email}}" class="form-control" name="email" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Phone</label>
            <input type="number" value="{{Auth::user()->phone}}" class="form-control" name="phone" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Company Name</label>

            <input type="text" value="{{Auth::user()->company_name}}" class="form-control" name="company_name" required>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>State</label>

            <input type="text" value="{{Auth::user()->company_state}}" class="form-control" name="company_state" required>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mt-2">
            <label>Address</label>
            <input type="text" value="{{Auth::user()->company_address}}" class="form-control" name="company_address" required>
        </div>  
    </div>
    <div class="col-md-6">
        <label >Pan No.</label>
        <div class="form-group mt-2">
            <input type="text" value="{{Auth::user()->company_pan}}" class="form-control" name="company_pan" required>

        </div>
    </div>
   
</div>
<div class="form-group mt-2">
 <input type="submit" value="save" class="form-control btn btn-primary">
                        </div>
                    </form>

                
                </div>
<hr>

                <div class="card-header">

                    <h3 class=" mb-0">Change Password</h3>
                </div>
                <div class="card-body">

                    <form action="{{route('vendor.password')}}" method="POST">
                        @csrf
                        <div class="form-group mt-2">

                            <label for="">Current password</label>
                            <input type="password" value="" class="form-control" name="currentpassword" required>

                        </div>
                        <div class="form-group mt-2">

                            <label for="">New password</label>
                            <input type="password" value="" class="form-control" name="newpassword" required>

                        </div>
                        <div class="form-group mt-2">

                            <label for="">Confirm password</label>
                            <input type="password" value="" class="form-control" name="confirmpassword" required>

                        </div>
                        <div class="form-group mt-2">
                        <input type="submit" value="save" class="form-control btn btn-primary">
                        </div>
                    </form>

                
                </div>
            </div>
        </div>
    </div>

</div>
@endsection