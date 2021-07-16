@extends('admin.master')
@section('main-content')
@php
    define('PAGE','product')
@endphp
<div class="card">
        <h3>Edit Color</h3>
   
    <div class="card-body">
 
        <form action="{{route('admin.color.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $color->id }}" name="id">
            <input type="hidden" value="{{ $color->product_id }}" name="pid">

            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="color" name="color" class="form-control" placeholder="Product name" value="{{$color->color}}" required>
                <br>
               <div style="background: {{ $color->color }};width:50px;height:50px;"></div>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Thumbnail (size:550X700)</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
                  <img src="{{ asset($color->image) }}" alt="" width="80px">
            </div>
           
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection
