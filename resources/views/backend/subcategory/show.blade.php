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
}.container div{
    float:left;
}
</style>
<div class="card">
        <h3 >Show Brand</h3>

    <div class="card-body">
      <div class="container">
          
               <div style="width: 200px;" >
<h4>Brand</h4>
<p>{{$category->cat->category}}</p>
              </div>
             
               <div style="width: 200px;">
<h4>Device</h4>
<p>{{$category->subcategory}}</p>
              </div>
              <div style="width: 200px;">
                <h4>Subategory Thumbnail</h4>
                <p><img src="{{asset($category->image)}}" alt="{{$category->image}}" width="100"></p>
            </div>
          </div>
    </div>
</div>
@endsection
