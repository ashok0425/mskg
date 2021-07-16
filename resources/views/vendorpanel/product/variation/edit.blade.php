@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','product')
@endphp
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Variation</h5>
   
    </div>
    <div class="card-body">
 
        <form action="{{route('vendor.variation.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $color->id }}" name="id">
            <input type="hidden" value="{{ $color->product_id }}" name="pid">

            <div class="mb-3">
                <label class="form-label">Variation</label>
                <input type="text" name="variation" class="form-control" placeholder="Product name" value="{{$color->variation}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">price</label>
                <input type="text" name="price" class="form-control price" placeholder="Product name" value="{{$color->price}}" required>
            </div>
            <div class="mb-3">
                
                <input type="hidden" value="{{ $color->comission }}" name="comission">
               <label class="form-label">Price After Adding {{ $color->comission }}% Comission</label>
               <input type="number" name="price_after_comission" class="form-control comission_price"  value="{{$color->price_after_comission}}" required readonly>
           </div>
          
           
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection
