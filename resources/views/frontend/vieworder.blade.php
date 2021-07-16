@extends('frontend.master')
@section('content')

<style>
    th,td{
        padding-left: 1rem;
        border:1px solid gray;
    }
</style>
<div class="container my-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Order Details of order ID {{ $order->tracking_code }}</h4>
<a href="{{ route('order') }}" class="btn btn-info text-white">Back</a>
       </div>
   <div class="row">
      

       <div class="col-md-6 p-2">

           <div class="card shadow">

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
                    <th>Cart Value</th>
                    <td>{{__getPriceunit()}} {{  number_format($order->cart_value) }}</td>
                </tr>
                <tr>
                    <th>Shipping</th>
                    <td>{{__getPriceunit()}} {{ number_format($order->shipping_charge) }}</td>
                </tr>
              @if ($order->coupon!==null)
                  
                <tr>
                    <th>Coupon({{ $order->coupon }})</th>
                    <td>{{ $order->coupon_value }}%</td>
                </tr>
              @endif

                <tr>
                    <th>Grand Total</th>
                   
                    <td>{{__getPriceunit()}} {{ number_format($order->total) }}</td>
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

        <div class="card shadow p-2">

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
   <div class="card mt-3 shadow px-4 py-2 " >
       <h3>Product Details</h3>
       <table class="table table-responsive-sm table-striped">
<thead>
    <th>Image</th>
    <th>Name</th>
    <th>Price({{ __getPriceunit() }})</th>
    <th>Qty</th>
    <th>Sub Total ({{ __getPriceunit() }})</th>

</thead>
<tbody>
    @foreach ($product as $item)
    <tr>
    <td>
       <img src=" {{ asset($item->image) }}" alt="Product image" class="img-fluid" width="80">
    </td>
    <td>
        {{ $item->name }}
        <p>
         {{ $item->color }}</p>
           <p>
           {{ $item->size }}</p>
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
       <div class="row text-center">
       
         <p class="py-0 my-0"><b>{{number_format($item->actual_price,2)}}</b></p>

    </div>          
@endif
      
    </td>
    <td>
        {{ $item->qty }}
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
