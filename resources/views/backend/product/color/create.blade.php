@extends('admin.master')
@section('main-content')
@php
    define('PAGE','product')
@endphp

<div class="card">
        <h3>Add Color</h3>
   
    <div class="card-body">

        <form action="{{route('admin.color.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $pid }}" name="pid">
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="color" name="color" class="form-control" placeholder="Product name" value="{{old('color')}}" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Thumbnail (size:550X700)</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
            </div>
           <div class="d-flex ">
            <button type="submit" class="btn btn-primary">Add</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('admin.product.attribute',['id'=>$pid]) }}" class="btn btn-info">Back</a>
            
           </div>
        </form>
    </div>
</div>
@endsection
