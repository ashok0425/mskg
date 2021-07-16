@extends('mail.layout')

   @section('content')
        <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                     
                    
                       <p>
                       Thank you for your order. Your order number {{$order_id}} has been placed.</p>
                        <h4>
                       Hello,{{$ship_name}}</h4>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                           <td>
                               <div class="invoice">
                                <h3>Invoice</h3> 
                      
                                 Invoice #: KB{{$order_id}}<br /> 
                                 
                               {{\Carbon\Carbon::parse($order_date)->format('d- M-Y')}}
                               <br>
                               Payment method:{{$payment_type}}
                               </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                             <td>
                            <div class="bill">
                                <h3>Bill to</h3>
                            {{$ship_name}}
                            <br>
                               {{$ship_email}}
                                <br>
                                {{$ship_phone}}
                                   <br>
                                {{$ship_address}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading" >
                <td >&nbsp;&nbsp; &nbsp; &nbsp; Item</td>
                  <td > Quantity</td>
                    <td >Unit Price</td>
                      <td >Total Price</td>

               
            </tr>
@php $grandtotal=0; @endphp
@foreach ($cart as $item)
@php 

    $grandtotal +=$item->price;

@endphp
            <tr class="item">
                <td> &nbsp;&nbsp; &nbsp;  {{$item->name}}
                

                
                </td>

                <td> &nbsp;&nbsp; &nbsp;  {{$item->qty}}</td>
                 <td> &nbsp;&nbsp; &nbsp;  {{__getPriceunit()}}{{number_format((float)$item->price,2)}}</td>
                  <td> &nbsp;&nbsp; &nbsp;   {{__getPriceunit()}}{{number_format((float)$item->qty *$item->price,2)}}</td>
                  
            </tr>
           @endforeach
        
            <tr class="total">
                
                <td colspan='4'>
                    
                <div class="padding">
                Sub-Total : {{__getPriceunit()}}{{ number_format($grandtotal,2)}}
              
                
                @if($coupon!=null)
                <br/>
                Discount : {{$coupon_value}}%
                @endif
                  <br/>Shipping Fee : {{__getPriceunit()}}{{number_format($shipping,2)}}<br/>
                               Total:  {{__getPriceunit()}}{{number_format($total,2)}}
                </div>
                    </td>    
       
            </tr>
   @endsection
        