@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','order')
@endphp

<div class="container">
    <div class="card p-0">
            <h3>Cancelled Order</h3>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order <br> Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price ({{__getPriceunit()}})</th>
                    <th>Qty</th>
                    <th>Total ({{__getPriceunit()}})</th>
                    <th>Status</th>
                    <th>Date</th>


            
                </tr>
            </thead>
            <tbody class="filter_result">
                
                @foreach ($order as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tracking_code}}</td>


                        <td><img src="{{asset($item->image)}}" alt="{{$item->name}}" width="60"> </td>
                        <td>{{$item->name}}
                                <p class="py-0 my-0">color:<span style="width:50px;height:20px;background:{{ $item->color }};padding:3px 5px;color:#fff;">{{ $item->color }}</span></p>
                            
                                               <p class="py-0 my-0">Size: {{$item->size}}</p>
                            <a href="{{route('vendor.product.edit',['id'=>$item->pid])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
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
                                
                                   <p class="py-0 my-0"><b>{{$item->coupon_value}}</b> %</p>

                                <b>{{number_format($item->price,2)}}</b>

                               </div>
                           </div>
                           @else 
                           <div class="row">
                            <div class="col-md-8">
                         
                         
                             <p class="py-0 my-0">Actual price:</p>
                            

                            </div>
                            <div class="col-md-4">
                             <p class="py-0 my-0"><b>{{$item->actual_price}}</b></p>

                            </div>
                        </div>          
@endif
                          
                        </td>

                        <td>{{$item->qty}}</td>
                       

                        <td>
                          
                            {{number_format($item->price *$item->qty,2 )}}

                        </td>

                        <td>
                            @if ($item->status==0)
                            <span class="badge text-white bg-danger">
                                Pending                  
                            </span>
                            @endif
                                    
                            @if ($item->status==1)
                            <span class="badge text-white bg-primary">
                                        Proccessing            
                            </span>
                            @endif
                            @if ($item->status==2)
                            <span class="badge text-white bg-info">
                                Shipping                     
                            </span>
                            @endif @if ($item->status==3)
                            <span class="badge text-white bg-success">
                                Delivery                   
                            </span>
                            @endif @if ($item->status==4)
                            <span class="badge text-white bg-danger">
                                Cancel                    
                            </span>
                            @endif
                        </td>
                        <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>




@endsection