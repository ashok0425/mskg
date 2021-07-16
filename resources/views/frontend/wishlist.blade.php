@extends('frontend.master')
@section('header')

    

<section class="section-pagetop bg-gray">
    <div class="container">
        <h2 class="title-page">My Wishlist</h2>
    </div> <!-- container //  -->
    </section>
@endsection
@section('content')
@if (count($wish)>0)

<section class="section-content padding-y">
    <div class="container">
    
    <div class="row">
        <main class="col-md-7 offset-md-2">
    <div class="card">
    
    <table class="table table-borderless table-shopping-cart table-responsive-sm">
    <thead class="text-muted">
    <tr class="small text-uppercase">
      <th scope="col">Product</th>
      
      <th scope="col" width="120">Price ({{ __getPriceunit() }})</th>
      <th scope="col" class="text-right" width="200">Action </th>
    </tr>
    </thead>
    <tbody>
        @php
            $carttotal=0;
        @endphp
@foreach ($wish as $item)

    <tr>
        <td>
            <figure class="itemside">
                <div class="aside"><img src="{{ asset($item->image) }}" class="img-sm"></div>
                <figcaption class="info">
                    <a href="#" class="title text-dark">{{ $item->name }}</a>
              
                </figcaption>
            </figure>
        </td>
     
        <td> 
            <div class="price-wrap"> 
                <small class="text-muted"> {{  number_format($item->price_after_comission,2) }} each </small> 
            </div> <!-- price-wrap .// -->
        </td>
        <td class="text-right"> 
        <a data-original-title="Save to Wishlist" title="add to cart" href="{{ route('addbacktocart',['id'=>$item->pid]) }}" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-shopping-cart"></i></a> 
        <a href="{{ route('wishlistremove',['id'=>$item->id]) }}" class="btn btn-light"> Remove</a>
        </td>
    </tr>
@endforeach
   
    </tbody>
    </table>
    
 	
    </div> <!-- card.// -->
   
    
        </main> <!-- col.// -->
       
    </div>
    
    </div> <!-- container .//  -->
    </section>
    @else 
    <div class="my-5"></div>
   <div class="container">
    <div class="text-white bg-info py-4 px-4">Your Wishlist is empty</div>
   </div>
   <div class="py-5 my-5"></div>

    @endif
    @endsection
   