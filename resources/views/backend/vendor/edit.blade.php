@extends('admin.master')
@section('main-content')
<style>
    h2{
        font-weight: 700;
        font-size: 1.2rem;

    }
    h2 span{
        color: rgb(4, 109, 109);
    }
</style>
@php
    define('PAGE','vmanagement')
@endphp


<div class="card">
        <h3>Vendor Detail Information</h3>
   
        @php
        $totalsale=DB::table('order_details')->where('vendor_id',$vendor->id)->sum('price');
        $totalpaid=DB::table('payments')->where('vendor_id',$vendor->id)->sum('amount');
    @endphp
    <h2>Total Sale Amount : <span>{{ __getPriceunit() }} {{ $totalsale}}</span> </h2>
    <h2>Paid Amount : <span>{{ __getPriceunit() }} {{ $totalpaid}}</span> </h2>
    <h2>Pending Amount : <span> {{ __getPriceunit() }} {{ $totalsale-$totalpaid}}</span> </h2>


      
        <div class="card-body">
          
            <form action="{{route('admin.vendor.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $vendor->id }}">
<div class="row">
<div class="col-md-6">
<div class=" mt-32">
    <img src="{{ asset($vendor->profile_photo_path) }}" alt="{{ $vendor->name }}" width="70">
</div>
</div>
<div class="col-md-6">
<div class="mt-2">
    <label>Name</label>
    <input type="text" value="{{$vendor->name}}" class="form-control" name="name" required>

</div>
</div>
<div class="col-md-6">
<div class="form-group mt-2">
    <label>Email</label>
    <input type="text" value="{{$vendor->email}}" class="form-control" name="email" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group mt-2">
    <label>Phone</label>
    <input type="number" value="{{$vendor->phone}}" class="form-control" name="phone" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group mt-2">
    <label>Company Name</label>

    <input type="text" value="{{$vendor->company_name}}" class="form-control" name="company_name" required>

</div>
</div>
<div class="col-md-6">
<div class="form-group mt-2">
    <label>State</label>

    <input type="text" value="{{$vendor->company_state}}" class="form-control" name="company_state" required>

</div>
</div>
<div class="col-md-6">
<div class="form-group mt-2">
    <label>Address</label>
    <input type="text" value="{{$vendor->company_address}}" class="form-control" name="company_address" required>
</div>  
</div>
<div class="col-md-6">
<label >Pan No.</label>
<div class="form-group mt-2">
    <input type="text" value="{{$vendor->company_pan}}" class="form-control" name="company_pan" required>

</div>
</div>
<div class="col-md-6 mt-3">
    <label >Status</label>
    <div class="form-group mt-2">
     <select name="status" id="" class="form-control">
         <option >--select status --- </option>
<option value="1" @if ($vendor->status==1)
    selected
@endif>Active</option>
<option value="0" @if ($vendor->status==0)
    selected
@endif>Block</option>

     </select>
    </div>
    </div>
</div>
<div class="form-group mt-2">
<input type="submit" value="Accept" class="form-control btn btn-primary">
                </div>
            </form>

        
        </div>
</div>
@endsection
