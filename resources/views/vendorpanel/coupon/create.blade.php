@extends('vendorpanel.master')
@section('content')

@php
    define('PAGE','coupon')
@endphp


<div class="card bg-white">
        <h3 >Add Coupon Code</h3>
   
    <div class="card-body">
   
        <form action="{{route('vendor.coupon.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Coupon Code</label>
                <input type="text" name="coupon" class="form-control" placeholder="Coupon"value="{{old('coupon')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Coupon Discount % (Note: <small>If the Coupon added doesn’t comply with our <a href="{{route('privacy')}}">policy</a>, the coupon might be rejected.</small>)</label>
                <input type="text" name="price" class="form-control" placeholder="Coupon Discount%"value="{{old('price')}}" required>
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Coupon Type</label>

               <select name="coupon_type" id="" class="form-control" required>
                   <option value="1">Percent</option>
                   <option value="2">Flat</option>

               </select>
            </div> --}}
            <div class="mb-3">
                <label class="form-label">Coupon Expiry Date
</label>
                <input type="date" name="expire_at" class="form-control" placeholder="Coupon Expiry Date
"value="{{old('expire_at')}}" required>
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
            </div> --}}
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection
