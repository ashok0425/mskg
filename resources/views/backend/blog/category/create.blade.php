
@extends('admin.master')
@section('main-content')
@php
    define('PAGE','blog')
@endphp


<div class="card">
        <h3 class="card-title">Add Category</h3>
   
    <div class="card-body">

        <form action="{{route('admin.blogcategory.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Category"value="{{old('category')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection
