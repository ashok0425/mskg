@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','product')
@endphp
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Add Variation</h5>
   
    </div>
    <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('vendor.variation.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $pid }}" name="pid">
            <div class="mb-3">
                <label class="form-label">variation</label>
                <input type="text" name="variation" class="form-control" placeholder="Product variation" value="{{old('variation')}}" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control price" placeholder="Product variation price" value="{{old('price')}}" required>
            </div>
            <div class="mb-3">
                @php
    $comission=DB::table('websites')->where('id',1)->value('comission');
                    
                @endphp
                <input type="hidden" value="{{ $comission }}" name="comission">
               <label class="form-label">Price After Adding {{ $comission }}% Comission</label>
               <input type="number" name="price_after_comission" class="form-control comission_price"  value="{{old('price_after_comission')}}" required readonly>
           </div>
           <div class="d-flex ">
            <button type="submit" class="btn btn-primary">Add</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('vendor.product.attribute',['id'=>$pid]) }}" class="btn btn-info">Back</a>
            
           </div>
        </form>
    </div>
</div>
@endsection
