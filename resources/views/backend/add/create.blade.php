@extends('admin.master')
@section('main-content')

@php
    define('PAGE','add')
@endphp


<div class="card">
        <h3>Add Advertisment</h3>
   
    <div class="card-body">
  
        <form action="{{route('admin.add.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Advertisment Link</label>
             <input name="title"   class='form-control' value=' {{ old('title') }}' type='url'>
            </div>
       
           
            <div class="mb-3">
                <label class="form-label">Advertisment image (size:1200 X 500)</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="" required>
                  </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection
