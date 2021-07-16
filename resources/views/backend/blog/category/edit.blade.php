@extends('admin.master')
@section('main-content')
@php
    define('PAGE','blog')
@endphp
<div class="card">
        <h3>Edit Brand</h3>
   
    <div class="card-body">
 
        <form action="{{route('admin.blogcategory.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}" />
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Category" value="{{$category->category}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
                  <img src="{{asset($category->image)}}" alt="{{$category->category}}" width="100">
            </div>
           
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection
