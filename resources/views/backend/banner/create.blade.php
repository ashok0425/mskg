@extends('admin.master')
@section('main-content')

@php
    define('PAGE','setting')
@endphp


<div class="card">
        <h3>Add Banner</h3>
   
    <div class="card-body">
  
        <form action="{{route('admin.banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Banner Title</label>
             <textarea name="title"   id="summernote1" class="form-control">
                 {{ old('title') }}
             </textarea>
            </div>
       
            <div class="mb-3">
                <label class="form-label">Banner Detail</label>
             <textarea name="text"  cols="30" rows="5" id="summernote2" class="form-control">
                 {{ old('text') }}
             </textarea>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Banner image (size:1200 X600)</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="" required>
                  </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection
