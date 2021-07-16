
@extends('admin.master')
@section('main-content')

@php
    define('PAGE','faq')
@endphp

<div class="card">
        <h3 class="card-title">Create Faq</h3>
   
    <div class="card-body">
   
        <form action="{{route('admin.faq.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            
            <div class="mb-3">
                <label class="form-label"> Title</label>
                <input type="text" name="title" class="form-control"value="{{old('title')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea type="text" name="description"  class="form-control" placeholder="Blog Detail" required>
                    {{old('detail')}}
                </textarea>
            </div>
           
            
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection


