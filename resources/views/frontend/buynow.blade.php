@extends('frontend.master')
<style>
    /* storage section */
.buttongroup label {
	border: 3px solid #000;
	padding: 6px 12px;
	cursor: pointer;
	transition: all 0.2s;
}

.buttongroup label {
margin-right: 3rem;
}



/* Hide the radio button */
input[name='payment'] {
	display: none;
}
/* The checked buttons label style */
input[name='payment']:checked + label {
  border: 3px solid rgb(0, 174, 255);

}
</style>
@section('header')
<section class="section-pagetop bg-gray ">
    <div class="container">
        <h2 class="title-page">Checkout</h2>
    </div> <!-- container //  -->
    </section>
@endsection
@section('content')
@php
$cart=DB::table('carts')->where('user_id',Auth::user()->id)->where('buynow',1)->get();
$setting = DB::table('websites')->first();
$charge = $setting->shipping_charge; 
$vat = $setting->tax; 
@endphp
@php
$grandtotal=0
@endphp
            @foreach($cart as $row)
@php
    $grandtotal+=$row->qty*$row->price;

@endphp
@endforeach



<section class="section-content padding-y">
    <div class="container" style="max-width: 720px;">
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <input type="hidden" name="buynow" value="1">

                <input type="hidden" name="total" value="@if(Session::has('coupon')) 
                {{ ___getPriceafterVat(Session::get('coupon')['balance'],$vat,$charge)  }} 
                @else  
                {{ ___getPriceafterVat($grandtotal,$vat,$charge)  }} 
                @endif">

                @if(Session::has('coupon'))
                <input type="hidden" name="coupon" value="{{ Session::get('coupon')['name'] }}">
                <input type="hidden" name="coupon_value" value="{{ Session::get('coupon')['discount'] }}">

                @else 

                @endif
                <input type="hidden" name="vat" value="{{ $vat }}">
                <input type="hidden" name="charge" value="{{ $charge }}">
                <input type="hidden" name="cart_value" value="{{ $grandtotal }}">


    <div class="card mb-4">
          <div class="card-body">
          <h4 class="card-title mb-3">Delivery info</h4>
    
        <div class="form-row">
            <div class="col form-group">
                <label>First name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" required name="fname">
            </div> <!-- form-group end.// -->
            <div class="col form-group">
                <label>Last name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" required name="lname">
            </div> <!-- form-group end.// -->
        </div> <!-- form-row end.// -->
    
        <div class="form-row">
            <div class="col form-group">
                <label>Email<span class="text-danger">*</span></label>
                  <input type="email" class="form-control" required name="email">
            </div> <!-- form-group end.// -->
            <div class="col form-group">
                <label>Phone<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" required name="phone">
            </div> <!-- form-group end.// -->
        </div> <!-- form-row end.// -->
    
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>State<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="state" required>
              </div> <!-- form-group end.// -->
            <div class="form-group col-md-6">
              <label>Zip Code<span class="text-danger">*</span></label>
              <input type="zip" class="form-control" name="zip" required>
            </div> <!-- form-group end.// -->
        </div> <!-- form-row.// -->
        <div class="form-group">
            <label>Address<span class="text-danger">*</span></label>
           <textarea class="form-control" rows="2" name="city" required></textarea>
        </div> <!-- form-group// -->  
    
          </div> <!-- card-body.// -->

          <h3 class="px-3">Payment </h3>
          
        <div class="row px-3 pb-4">
            <div class="col-md-6">
              <div class=" buttongroup payment">
                <input id="paypal" type="radio" value="esewa" name="payment"    required/> 
                <label for="paypal" >    
              <img src="{{ asset('esewa.png') }}" alt=" payment method" class="img-fluid" style="max-height: 60px;min-width:200px" >
              <span class="text-danger">*</span></label>

              </div>
            </div>
            <div class="col-md-6">
              <div class=" buttongroup payment">
                <input id="cod" type="radio" value="cod" name="payment"  required checked /> 
                <label for="cod" >    
                  <img src="{{ asset('cod.png') }}" alt=" payment method" class="img-fluid" style="max-height: 60px;min-width:200px">
              <span class="text-danger">*</span></label>

              </div>
            </div>
          <button class="btn btn-block btn-info mt-4" type="submit">Checkout Now</button>

          </div>
        </form>
        </div>  <!-- card .// -->
    
    
    
    </div> <!-- container .//  -->
    </section>
    @endsection