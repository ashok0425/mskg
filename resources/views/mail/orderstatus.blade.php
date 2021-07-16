@extends('mail.layout')

   @section('content')
        <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                     
                       <p>
                      {{$msg}}</p>
                        <h4>
                       Hello, "{{$ship_name}}"</h4>
                        </tr>
                    </table>
                </td>
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
        