@extends('frontend.master')
@section('header')
<section class="section-pagetop bg-gray ">
    <div class="container">
        <h2 class="title-page">My Cart</h2>
    </div> <!-- container //  -->
    </section>
@endsection
@section('content')

@php
    $vat=DB::table('websites')->first();
@endphp
@if (count($cart)>0)
    

<section class="section-content padding-y">
    <div class="container">
    
    <div class="row">
        <main class="col-md-9">
    <div class="card">
    
    <table class="table table-borderless table-shopping-cart table-responsive-sm">
    <thead class="text-muted">
    <tr class="small text-uppercase">
      <th scope="col">Product</th>
      
      <th scope="col" width="120">Quantity</th>
      <th scope="col" width="120">Price ({{ __getPriceunit() }})</th>
      <th scope="col" class="text-right" width="200"> </th>
    </tr>
    </thead>
    <tbody>
        @php
            $carttotal=0;
        @endphp
@foreach ($cart as $item)
@php
    $carttotal+=$item->qty*$item->price
    
@endphp
    <tr>
        <td>
            <figure class="itemside">
                <div class="aside "><a href="{{ route('product',['id'=>$item->pid,'name'=>$item->name]) }}"><img src="{{ asset($item->image) }}" class="img-sm"></a></div>
                <figcaption class="info">
                    <a href="#" class="title text-dark">{{ $item->name }}</a>
                    <p class="text-muted small">
                        @if ($item->color !='')
                        color: <span style="width:50px;height:10px;background:{{ $item->color }};color:white;padding:3px 2px;">{{ $item->color }}</span>
                        <br>
                        
                    @endif 
                    @if ($item->size !='')
                    Brand: {{ $item->size }}
                    <br>
                    
                @endif
                    </p>
                </figcaption>
            </figure>
        </td>
        <td class="text-left"> 
         
     <div class="qty mt-3 d-flex ">

        <button  class="incrementbtn px-4 py-1 text-white" style="background: #60c3d3;border-color:#60c3d3" type="button" data-input="demoInput{{ $item->id }}" data-id="{{ $item->id }}" data-price="{{ $item->price }}" @if (Session::has('coupon')) disabled title="You can't increase item quantity once coupon is applied"
            
        @endif>+</button> 
        <input id="demoInput{{ $item->id }}" type="number" readonly value="{{ $item->qty }}" class="value text-center  py-1" name="qty" style="max-width: 80px" min="1">
  
        <button  class="decrementbtn px-4 py-1  text-white" style="background: #60c3d3;border-color:#60c3d3;" type="button" data-input="demoInput{{ $item->id }}" data-id="{{ $item->id }}" data-price="{{ $item->price }}" @if (Session::has('coupon'))disabled
            title="You can't descrease item quantity once coupon is applied"
        @endif>-</button>
      </div>
        </td>
        <td> 
            <div class="price-wrap"> 
                <var class="price" id="priced{{ $item->id }}">{{ number_format($item->price * $item->qty,2) }}</var> 
                <small class="text-muted"> {{ $item->price }} each </small> 
            </div> <!-- price-wrap .// -->
        </td>
        <td class="text-right"> 
        <a data-original-title="Save to Wishlist" title="add to wishlists" href="{{ route('addtowishlist',['id'=>$item->pid]) }}" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
        <a href="{{ route('cartremove',['id'=>$item->id]) }}" class="btn btn-light"> Remove</a>
        </td>
    </tr>
@endforeach
    <tr>
        <td  colspan="4" class="text-right">
        <hr>

            <h4>Cart Total : {{ __getPriceunit() }} <span id="carttotal">{{ number_format($carttotal,2) }}</span></h4>
        </td>
    </tr>
    </tbody>
    </table>
    
    <div class="card-body border-top">
        <a href="{{ route('checkout') }}" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
        <a href="{{ route('store') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
    </div>	
    </div> <!-- card.// -->
   
    
        </main> <!-- col.// -->
        <aside class="col-md-3">
          
                        @if(Session::has('coupon'))
               <div class="text-success mb-2 ">Coupon  ({{ Session::get('coupon')['name'] }} ) hasbeen Applied</div>
                        @else
                        <form action="{{route('coupon')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="coupon" placeholder="Coupon code">
                                    <span class="input-group-append"> 
                                        <button class="btn btn-primary">Apply</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                             @endif
                             
            <div class="card">
                <div class="card-body">
                       
                        @if(Session::has('coupon'))

                        <dl class="dlist-align">
                            <dt>Sub-Total :</dt>
                            <dd class="text-right">{{ __getPriceunit() }} {{ number_format((float)Session::get('coupon')['balance'],2)}}</dd>
                          </dl>
                          <dl class="dlist-align">
                              <dt>Coupon <a href="{{route('couponremove')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash text-light"></i></a>:</dt>
                              <dd class="text-right">{{Session::get('coupon')['discount']}}%</dd>
                            </dl>
                            
                            <dl class="dlist-align">
                                <dt>Shipping :</dt>
                                <dd class="text-right ">{{ __getPriceunit() }} {{ $vat->shipping_charge }} </dd>
                              </dl>
                              <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right ">{{ __getPriceunit()}}  {{ number_format((float) ___getPriceafterVat(Session::get('coupon')['balance'], $vat->tax,$vat->shipping_charge),2) }}</dd>
                              </dl>
                            @else 
                           
                              
                        <dl class="dlist-align">
                            <dt>Sub-Total :</dt>
                            <dd class="text-right">{{ __getPriceunit() }} <span id="subtotal">{{ number_format((float)$carttotal,2)}}</span></dd>
                          </dl>
                       
                            
                            <dl class="dlist-align">
                                <dt>Shipping :</dt>
                                <dd class="text-right ">{{ __getPriceunit() }} {{ $vat->shipping_charge }} </dd>
                              </dl>
                              <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right ">{{ __getPriceunit()}}  <span id="grandtotal">{{ number_format((float) ___getPriceafterVat($carttotal, $vat->tax,$vat->shipping_charge),2) }}</span></dd>
                              </dl>
                                @endif

                       
                        <hr>
                      
                        
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
        </aside> <!-- col.// -->
    </div>
    
    </div> <!-- container .//  -->
    </section>

    @else 
    <div class="my-5"></div>
   <div class="container">
    <div class="text-white bg-info py-4 px-4">Your Cart is empty</div>
   </div>
   <div class="py-5 my-5"></div>

    @endif
    @endsection