@extends('admin.master')
@section('main-content')
@php
    define('PAGE','setting')
@endphp

<div class="card">
        <h3>Update Page Seeting</h3>
   
    <div class="card-body">

        <form action="{{route('admin.page.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">About us</label>
              <textarea name="about" id="summernote1" cols="30" rows="10" id="summernote">{{ $page->about }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Term & conditions</label>
              <textarea name="term" id="summernote2" cols="30" rows="10" id="summernote1">{{ $page->term }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Privacy Policy</label>
              <textarea name="policy" id="summernote3" cols="30" rows="10" id="summernote1">{{ $page->policy }}</textarea>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Seller Handbook</label>
              <textarea name="price" id="summernote" cols="30" rows="10" id="summernote1">{{ $page->price }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection
