@extends('admin.master')
@section('main-content')
@php
    define('PAGE','product')
@endphp
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Product</h5>
   
    </div>
    <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('admin.product.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
       <input name="id" value="{{$product->id}}" type="hidden"/>
            <div class="mb-3">
                <label class="form-label">Product</label>
                <input type="text" name="name" class="form-control" placeholder="Accessories" value="{{$product->name}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Select Brand</label>
                <select name="category"  class="form-control category data" data-text="category" required>
                 
                    @foreach ($category as $item)
                    <option value="{{$item->id}}" @if($item->id==$product->id)selected @endif >{{$item->category}}</option>

                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Select Device</label>
                <select name="subcategory"  class="form-control subcategory data" data-text="subcategory" required>
                @if ($product->subcategory_id!==null)
                     <option value="{{$product->subcategory_id}}">{{$product->subcat->subcategory}}</option> 
                @endif
                  
                    
                </select>
            </div>
               
             <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
                  <img src="{{asset($product->image)}}" width='100'/>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
