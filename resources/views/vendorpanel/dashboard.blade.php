@extends('vendorpanel.master')
<style>
    .rotate{
        transform: rotateY(180deg)!important;
    }
</style>
@section('content')@php
define('PAGE','dashboard')
@endphp


<div class="container-fluid p-0">

				
    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                {{-- Total Sales in a day --}}
                                @php
                                $today_total=0;
                                $yesterday_total=0;

                                    $today=DB::table('order_details')->join('orders','orders.id','order_details.order_id')->select('order_details.*','orders.status')->whereDay('order_details.created_at',today()->day)->where('order_details.vendor_id',Auth::user()->id)->get();
                                    foreach ($today as $value) {
                                    $today_total+=$value->price;
                                    }

                                @endphp
                                <h5 class="card-title mb-4">Today Order</h5>
                                <h1 class="mt-1 mb-3"><i class="fas fa-chart-bar"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                           
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                                $today_total=0;
                                $yesterday_total=0;

                                    $today=DB::table('order_details')->join('orders','orders.id','order_details.order_id')->select('order_details.*','orders.status')->whereMonth('order_details.created_at',today()->month)->where('order_details.vendor_id',Auth::user()->id)->get();
                                    foreach ($today as $value) {
                                    $today_total+=$value->price;
                                    }
                                
                              
                                    
                                  
                                @endphp
                                <h5 class="card-title mb-4">This Month Order</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-chart-line "></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                                 </h1>
                              
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                                    $today=DB::table('order_details')->where('vendor_id',Auth::user()->id)->sum('price');
                                @endphp
                                <h5 class="card-title mb-4">Total Earning</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-comment-dollar"></i> {{ __getPriceunit() .number_format($today,2) }}</h1>
                                 </h1>
                              
                            </div>
                        </div>

                    
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                {{-- Total Deliver in a day --}}
                                @php
                                $today_total=0;
                                $yesterday_total=0;

                                $today=DB::table('order_details')->join('orders','orders.id','order_details.order_id')->select('order_details.*','orders.status')->whereMonth('order_details.created_at',today()->month)->where('status',3)->where('order_details.vendor_id',Auth::user()->id)->get();
                                    foreach ($today as $value) {
                                        $today_total+=$value->price;

                                    }
                            
                              
                                  
                                @endphp
                                <h5 class="card-title mb-4">Today Deliver</h5>
                                <h1 class="mt-1 mb-3"> 
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                                  </h1>
                              
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                                $today_total=0;
                                $yesterday_total=0;

                                $today=DB::table('order_details')->join('orders','orders.id','order_details.order_id')->select('order_details.*','orders.status')->whereMonth('order_details.created_at',today()->month)->where('status',3)->where('order_details.vendor_id',Auth::user()->id)->get();
                                    foreach ($today as $value) {
                                        $today_total+=$value->price;

                                    }
                               
                                    
                                  
                                @endphp
                                <h5 class="card-title mb-4">This Month Deliver</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-chart-area"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                                  </h1>
                             
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                                    $today=DB::table('payments')->where('vendor_id',Auth::user()->id)->sum('amount');
                                @endphp
                                <h5 class="card-title mb-4">Total Payment</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-comment-dollar"></i> {{ __getPriceunit() .number_format($today,2) }}</h1>
                                 </h1>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            {{-- sales in week --}}
            <div class="card flex-fill w-100">
               
                <div class="card-body py-3">
                    <div id="chartContainer2" style="height: 340px; width: 100%;"></div>

                </div>
            </div>
          
        </div>
    </div>

    {{-- Lastest order  --}}
@php
    $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',0)->limit(8)->get();
@endphp


    <div class="row">
        <div class="col-12 col-lg-7 col-xxl-7 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Latest Order</h5>
                </div>
                <table  class="table table-responsive-sm" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price/pcs({{ __getPriceunit() }})</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                           
        
                    
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($order as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                               
                                <td>{{$item->name}}
                                    <a href="{{route('vendor.product.edit',['id'=>$item->pid])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                </td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->price *$item->qty }}</td>
                               
                            
                                {{-- <td>
                                    <form action="{{route('vendor.order.show')}}" method="POST">
                                        @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-info"><i class="far fa-eye"></i></button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                      </table>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xxl-5 d-flex">
                <div class="card flex-fill w-100">
                    <div id="chartContainer3" style="height: 340px; width: 100%;"></div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill w-100">
                <div id="chartContainer4" style="height: 340px; width: 100%;"></div>
        </div>
    </div>
    </div>

</div>
<x-vendorchart />
@endsection
