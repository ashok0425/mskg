@extends('admin.master')
@section('main-content')
@php
    define('PAGE','device')
@endphp

<div class="card">
        <h3>Edit Subcategory</h3>
   
    <div class="card-body">
   
        <form action="{{route('admin.subcategory.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$subcategory->id}}" />
            <div class="mb-3">
                <label class="form-label">Brand</label>
                <input type="text" name="subcategory" class="form-control"  value="{{$subcategory->subcategory}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Select Device</label>
                <select name="category" id="" class="form-control">
                    @foreach ($category as $item)
                    <option value="{{$item->id}}" @if ($item->id==$subcategory->category_id)
                        selected
                    @endif>{{$item->category}}</option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
                  <img src="{{asset($subcategory->image)}}" alt="{{$subcategory->category}}" width="100">
            </div>
           
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection
