@extends('admin.master')
@section('main-content')

@php
    define('PAGE','add')
@endphp


<div class="card">
        <h3 class="card-title">Edit Advertisment</h3>
   
    <div class="card-body">

        <form action="{{route('admin.add.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
       <input name="id" value="{{$banner->id}}" type="hidden"/>
       <div class="mb-3">
        <label class="form-label">Advertisment Link</label>
     <input name="title"   class='form-control' value=' {{ $banner->title }}' type='url'>
        
     
    </div>

   
   
    <div class="mb-3">
        <label class="form-label">Advertisment image (size:1200 X 500)</label>
        <div class="file-upload-wrapper" data-text="Select your file!">
            <input name="file" type="file" class="file-upload-field" value="" >
          </div>
          <br>
          <img src="{{asset($banner->image) }}" alt="" width="100">
    </div>
   
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
