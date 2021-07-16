@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','shop')
@endphp

<div class="card">
        <h3>Edit Shop</h3>
   
    <div class="card-body">
  
        <form action="{{route('vendor.shop.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $shop->id }}" name="id">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $shop->name}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Thumbnail (size:400X400)</label>
                        <div class="file-upload-wrapper" data-text="Select your file!">
                            <input name="file" type="file" class="file-upload-field" value="">
                          </div>
                          <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}" width="70">
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

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop cover image (size:1200X400)</label>
                        <input type="file" name="cover" class="form-control" value="" >
                        <img src="{{ asset($shop->cover) }}" alt="{{ $shop->cover }}" width="70">

                    </div>
                </div>
                <div class="col-md-6">
                    @php
                        $gallery=DB::table('shop_galleries')->where('shop_id',$shop->id)->get();
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">Shop Gallery </label>
                        <input type="file" name="gallery[]" class="form-control" value="" multiple >
                        @foreach ($gallery as $item)
                        <img src="{{ asset($item->image) }}" alt="{{ $item->image }}" width="50">
                            
                        @endforeach
                    </div>
                </div>
                {{-- </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Adress</label>
                        <input type="text" name="address" class="form-control" value="{{$shop->address}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Shop Contact no</label>
                        <input type="number" name="contact_no" class="form-control" value="{{$shop->contact}}" required>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Desciption</label>
                       <textarea name="description"  id="summernote2" required class="form-control">
                        {{$shop->descr}}

                       </textarea>
                    </div>
                </div>
            </div>
           
         
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
