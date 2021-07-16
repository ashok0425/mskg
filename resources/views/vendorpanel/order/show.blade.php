@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','order')
@endphp
<style>
    th,td{
        padding-left: 1rem;
    }
</style>
<div class="container">
  
   <div class="card">
       <h3>Product Details</h3>
       <table class="table table-responsibe-sm table-striped">
<thead>
    <th>Image</th>
    <th>Name</th>
    <th>Color</th>
    <th>Size</th>
    <th>Price({{ __getPriceunit() }})</th>
    <th>Qty</th>
    <th>Sub Total ({{ __getPriceunit() }})</th>

</thead>
<tbody>
    @foreach ($product as $item)
    <tr>
    <td>
        <img src="{{ asset($item->image) }}" alt="" width="70">
    </td>
    <td>
        {{ $item->name }}
    </td>
    <td>
        {{ $item->color }}
    </td>
    <td>
        {{ $item->size }}
    </td>
    <td>
        {{ $item->price }}
    </td>
    <td>
        {{ $item->qty }}
    </td>
    <td>
        {{  $item->qty * $item->price }}
    </td>
</tr>
    @endforeach
   
</tbody>
       </table>
   </div>
</div>
@endsection
