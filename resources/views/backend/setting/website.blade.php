@extends('admin.master')
@section('main-content')
@php
    define('PAGE','setting')
@endphp
<div class="card">
    <h3>Update Website Information</h3>
    
    <div class="card-body">
      <div class="container">
        <form action="{{ route('admin.website.update') }}" method="POST" enctype="multipart/form-data">
@csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Meta title" value="{{$website->title}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Meta Keyword</label>
                    <input type="keyword" name="keyword" class="form-control" placeholder="Meta Keyword" value="{{$website->keyword}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="descr" class="form-control" placeholder="Meta Description" value="{{$website->descr}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Website url</label>
                    <input type="url" name="url" class="form-control" placeholder="Website url" value="{{$website->url}}" >
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <div class="file-upload-wrapper" data-text="Select your file!">
                    <input name="file" type="file" class="file-upload-field" value="">
                  </div>
                  <br>
                  <img src="{{ asset($website->image) }}" width="70" alt="">
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Shipping Charge ({{ __getPriceunit() }})</label>
                    <input type="text" name="shipping_charge" class="form-control"  value="{{$website->shipping_charge}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Comisssion Percent </label>
                    <input type="text" name="comission" class="form-control"  value="{{$website->comission}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone </label>
                    <input type="number" name="phone" class="form-control"  value="{{$website->phone1}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label"> Address </label>
                    <input type="text" name="address1" class="form-control"  value="{{$website->address1}}" >
                </div>
            </div>
           
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email Address </label>
                    <input type="email" name="email1" class="form-control"  value="{{$website->email1}}" >
                </div>
            </div>
            
            
           
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Instagram </label>
                    <input type="url" name="instagram1" class="form-control"  value="{{$website->instagram1}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">facebook </label>
                    <input type="url" name="facebook1" class="form-control"  value="{{$website->facebook1}}" >
                </div>
            </div>
          
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Pinterest </label>
                    <input type="url" name="twitter1" class="form-control"  value="{{$website->twitter1}}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Other </label>
                    <input type="url" name="other1" class="form-control"  value="{{$website->other1}}" >
                </div>
            </div>
            
            <input type="submit" value="update" class="btn btn-block btn-info">
        </div>
    </form>

      </div>
    </div>
</div>
@endsection
