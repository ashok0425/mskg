@extends('admin.master')
@section('main-content')

@php
    define('PAGE','device')
@endphp


<div class="card">
        <h3>Add Accessories</h3>
   
    <div class="card-body">

        <form action="{{route('admin.part.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Accessories</label>
                <input type="text" name="part" class="form-control" placeholder="Accessories" value="{{old('part')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Select Brand</label>
                <select name="category"  class="form-control category data" data-text="category" required>
                    <option value="">--select barnd---</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->category}}</option>

                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Select Device</label>
                <select name="subcategory"  class="form-control subcategory data" data-text="subcategory" required>
                    <option value="">--select device---</option>
                    
                </select>
            </div>
                <div class="mb-3">
                <label class="form-label">Select Modal</label>
                <select name="modal"  class="form-control model data" data-text="model" required>
                    <option value="">--select modal---</option>
                    
                </select>
            </div>
             <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{old('price')}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection
