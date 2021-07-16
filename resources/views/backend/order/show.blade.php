@extends('admin.master')
@section('main-content')
@php
    define('PAGE','order')
@endphp
<style>
    th,td{
        padding-left: 1rem;
    }
</style>
<div class="container">
   <div class="row">
       <div class="col-md-6">
           <div class="card px-0 px-0">
            <h3>Order Details of order Id {{ $order->tracking_code }}</h3>

               <table>
                   <tr>
                       <th>Order Id</th>
                       <td>{{ $order->tracking_code }}</td>
                   </tr>
                
                   <tr>
                    <th>Payment Type</th>
                    <td>{{ $order->payment_type }}</td>
                </tr>
                   <tr>
                    <th>Payment Id</th>
                    <td>{{ $order->payment_id }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{__getPriceunit()}}{{  number_format($order->total,2) }}</td>
                </tr>
                <tr>
                    <th>Shipping</th>
                    <td>{{__getPriceunit()}}{{ $order->shipping_charge }}</td>
                </tr>
                <tr>
                    <th>Cart Value</th>
                    <td>{{ $order->cart_value }}</td>
                </tr>
                <tr>
                    <th>Coupon</th>
                    <td>{{ $order->coupon }}</td>
                </tr>
                <tr>
                    <th>Coupon Value</th>
                    <td>{{ $order->coupon_value }}</td>
                </tr>
                <tr>
                    <th>Grand Total</th>
                    @php
                        $taxamount= ($order->total*$order->tax)/100
                    @endphp
                    <td>{{__getPriceunit()}}{{number_format($order->total,2) }}</td>
                </tr>
                <tr>
                    <th>Order Status</th>
    <td>
                    @if ($order->status==0)
                    <span class="badge text-white bg-danger">
                        Pending                  
                    </span>
                    @endif
                            
                    @if ($order->status==1)
                    <span class="badge text-white bg-primary">
                                Proccessing            
                    </span>
                    @endif
                    @if ($order->status==2)
                    <span class="badge text-white bg-info">
                        Shipping                     
                    </span>
                    @endif @if ($order->status==3)
                    <span class="badge text-white bg-success">
                        Delivery                   
                    </span>
                    @endif @if ($order->status==4)
                    <span class="badge text-white bg-danger">
                        Cancel                    
                    </span>
                    @endif
                </td>
                 </tr>
               </table>

           </div>
       </div>
       <div class="col-md-6">

        <div class="card px-0">
            <h3>Shipping Details of order Id {{ $order->tracking_code }}</h3>

            <table>
                <tr>
                    <th> Name</th>
                    <td>{{ $shipping->name }}</td>
                </tr>
                <tr>
                    <th> Email</th>
                    <td>{{ $shipping->email }}</td>
                </tr>
                <tr>
                    <th> Phone</th>
                    <td>{{ $shipping->phone }}</td>
                </tr>
                <tr>
                    <th> State</th>
                    <td>{{ $shipping->state }}</td>
                </tr>
             
                <tr>
                    <th>Address</th>
                    <td>{{ $shipping->city }}</td>
                </tr>
              
                <tr>
                    <th>Zip Code</th>
                    <td>{{ $shipping->zip }}</td>
                </tr>
             
             
            </table>

        </div>
    </div>
   </div>
   <div class="card px-0">
       <h3>Product Details</h3>
       <table class="table table-responsibe-sm table-striped">
<thead>
    <th>Image</th>
    <th>Name</th>
    <th>Vendor Price({{ __getPriceunit() }})</th>
    <th>Qty</th>
    <th>Vendor Total <br> ({{ __getPriceunit() }})</th>
    <th>Comission %</th>
    <th> After Commision <br>({{ __getPriceunit() }})</th>



</thead>
<tbody>
    @foreach ($product as $item)
    <tr>
    <td>
    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="60">
    </td>
    <td>
        {{ $item->name }}
        <p class="py-0 my-0">
            Color:<span style="width:50px;height:20px;background:{{ $item->color }};padding:3px 5px;color:#fff;">{{ $item->color }}</span>

        </p>
        <p class="my-0 py-0">
            Size : {{ $item->size }}
        </p>
    </td> 
   
    <td>
        @if($item->coupon)
       <div class="row">
           <div class="col-md-8">
        
        
            <p class="py-0 my-0">Actual price:</p>
           <p class="py-0 my-0"> Coupon({{$item->coupon}})</p>
           <p class="py-0 my-0"> Price after coupon</p>

           </div>
           <div class="col-md-4">
            <p class="py-0 my-0"><b>{{number_format($item->actual_price,2)}}</b></p>
            
               <p class="py-0 my-0"><b>{{number_format($item->coupon_value,2)}}</b> %</p>

            <b>{{number_format($item->price)}}</b>

           </div>
       </div>
       @else 
       <div class="row">
        <div class="col-md-8">
     
     
         <p class="py-0 my-0">Actual price:</p>
        

        </div>
        <div class="col-md-4">
         <p class="py-0 my-0"><b>{{number_format($item->actual_price,2)}}</b></p>

        </div>
    </div>          
@endif
      
    </td>
    <td>
        {{ $item->qty }}
    </td>
    <td>
        {{  $item->qty * $item->price }}
    </td>
    <td>
        {{ $item->comission }}%
    </td>
  
 
    
    <td>
       
        {{ number_format($item->price_after_comission*$item->qty,2) }}
        
    </td>
</tr>
    @endforeach
   
</tbody>
       </table>
   </div>
</div>
@endsection
