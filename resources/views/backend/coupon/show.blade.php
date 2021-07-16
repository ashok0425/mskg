@extends('admin.master')
@section('main-content')
@php
    define('PAGE','coupon')
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
        <h3>Show Brand Details</h3>
 
    <div class="card-body">
      
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
