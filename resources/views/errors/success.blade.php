@extends('frontend.master')

@section('content')
  

	<div class="container my-5">
<br>
<br>
<br>
@php
    $id=DB::table('orders')->where('tracking_code',$orderid)->value('id');
@endphp
        <center>
       <span class="text-success"> Thank you for Shopping with us.Your order ID is <a href="{{ route('order.show',['id'=>$id]) }}">
        <span><strong class="text-info text-decoration-underline">{{$orderid}}</strong></span>
    </a></span>
<br><br>
<br>
           <a href="/" style="background: rgb(0, 90, 166);padding:1rem 2rem;color:#fff;border-radius:100px">&laquo; Back to home page</a>
        </center>
        <br>
<br>
<br>

    </div>


@endsection