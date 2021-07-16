
@extends('admin.master')
@section('main-content')

@php
    define('PAGE','faq')
@endphp


<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Faq</h5>
   
    </div>
    <div class="card-body">
 
        <form action="{{route('admin.faq.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $blog->id }}" name="id">
          
            <div class="mb-3">
                <label class="form-label"> Title</label>
                <input type="text" name="title" class="form-control" placeholder="Blog title"value="{{$blog->title}}" required>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea type="text" name="description"  class="form-control" placeholder="Blog Detail" required>
                    {{$blog->desrc}}
                </textarea>
            </div>
           
           
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
