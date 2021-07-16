@extends('admin.master')
@section('main-content')

@php
    define('PAGE','device')
@endphp


<div class="card">
        <h3>Edit Accessories</h3>
   
    <div class="card-body">

        <form action="{{route('admin.part.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
       <input name="id" value="{{$part->id}}" type="hidden"/>
            <div class="mb-3">
                <label class="form-label">Accessories</label>
                <input type="text" name="part" class="form-control" placeholder="Accessories" value="{{$part->part}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Select Brand</label>
                <select name="category"  class="form-control category data" data-text="category" required>
                 
                    @foreach ($category as $item)
                    <option value="{{$item->id}}" @if($item->id==$part->id)selected @endif >{{$item->category}}</option>

                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Select Device</label>
                <select name="subcategory"  class="form-control subcategory data" data-text="subcategory" required>
                    <option value="{{$part->subcategory_id}}">{{$part->subcat->subcategory}}</option>
                    
                </select>
            </div>
                <div class="mb-3">
                <label class="form-label">Select Modal</label>
                <select name="modal"  class="form-control model data" data-text="model" required>
                <option value="{{$part->modal_id}}">{{$part->modal->modal}}</option>
                    
                </select>
            </div>
             <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{$part->price}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
                  <img src="{{asset($part->image)}}" width='100'/>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
