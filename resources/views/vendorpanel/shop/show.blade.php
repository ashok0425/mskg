@extends('admin.master')
@section('main-content')
@php
    define('PAGE','device')
@endphp

<style>
    @media print {
    #printbtn {
        display :  none;
    }
    h5{
        display: none;
    }
    .navbar{
        display: none;
    }
}
</style>
<div class="card">
        <h3 class="card-title">Device Details</h3>
   
    <div class="card-body">
        <h4 style="text-align: center;border-bottom:1px solid gray;padding-bottom:1rem;">Brand Details</h4>
      <div class="container">
          <div style="display: flex; justify-content:spance-evenly;">
              <div style="width: 200px;">
<h4>Brand</h4>
<p>{{$category->category}}</p>
              </div>
              <div style="width: 200px;">
                <h4>Category Thumbnail</h4>
                <p><img src="{{asset($category->image)}}" alt="{{$category->image}}" width="100"></p>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
