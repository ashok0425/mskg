
@extends('admin.master')
@section('main-content')

@php
    define('PAGE','blog')
@endphp

<div class="card">
        <h3 class="card-title">Create Blog</h3>
   
    <div class="card-body">
   
        <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
                <label class="form-label">Select Category</label>
                <select name="category"  class="form-control">
                    @foreach ($category as $item)
                        <option value="{{ $item->id}}" 
                       >{{ $item->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Blog Author"value="{{old('author')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Blog Title</label>
                <input type="text" name="title" class="form-control" placeholder="Blog title"value="{{old('title')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Blog Detail</label>
                <textarea type="text" name="detail" id="summernote" class="form-control" placeholder="Blog Detail" required>
                    {{old('detail')}}
                </textarea>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
            </div>
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection


