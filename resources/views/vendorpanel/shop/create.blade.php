@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','shop')
@endphp

<div class="card">
        <h3>Create New Shop</h3>
   
    <div class="card-body">
  
        <form action="{{route('vendor.shop.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Thumbnail (size:400X400)</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="file" type="file" class="file-upload-field" value="" required>
                          </div>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Cover Image(size:1200X400)</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="cover" type="file" class="file-upload-field" value="" required>
                          </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Choose Multiple Image For Gallery (size:400X400)</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="gallery[]" type="file" class="file-upload-field" multiple>
                          </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{old('longitude')}}" required>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{old('latitude')}}" required>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Adress</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}" required>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Contact no</label>
                        <input type="number" name="contact_no" class="form-control" value="{{old('contact_no')}}" required>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Desciption</label>
                       <textarea name="description" id="summernote2"  class="form-control" required='required'>
{{ old('description') }}

                       </textarea>
                    </div>
                </div>
            </div>
           
         
           
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
