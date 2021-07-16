@extends('admin.master')
@section('main-content')
<style>
    .rotate{
        transform: rotateY(180deg)!important;
    }
</style>
@php
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

                                    $today=DB::table('orders')->whereDay('created_at',today()->day)->get();
                                    foreach ($today as $value) {
                                    $today_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                // {{-- Total Sales in a yesterday  --}}
                                    
                                    $yesterday=DB::table('orders')->whereDay('created_at',today()->subDays(1))->get();
                               
                              
    
                                    foreach ($yesterday as $value) {
                                    $yesterday_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                    
                                  
                                @endphp
                                <h5 class="card-title mb-4">Today Order</h5>
                                <h1 class="mt-1 mb-3"><i class="fas fa-signal @if($today_total>$yesterday_total)text-success   @else text-danger rotate @endif"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                           
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                                $today_total=0;
                                $yesterday_total=0;

                                    $today=DB::table('orders')->whereMonth('created_at',today()->month)->get();
                                    foreach ($today as $value) {
                                    $today_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                
                                // {{-- Total order in a a previous  --}}
                                    
                                    $yesterday=DB::table('orders')->whereMonth('created_at',today()->subMonth(1))->get();
                               
                              
    
                                    foreach ($yesterday as $value) {
                                    $yesterday_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                    
                                  
                                @endphp
                                <h5 class="card-title mb-4">This Month Order</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal @if($today_total>$yesterday_total)text-success   @else text-danger rotate @endif"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                                 </h1>
                              
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                             
                               $user=DB::table('users')->get();
                                  
                                @endphp
                                <h5 class="card-title mb-4">Today  Register Vendor</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal text-success"></i> {{ count($user)}}</h1>
                                 </h1>
                             
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                             
                               $user=DB::table('users')->get();
                                  
                                @endphp
                                <h5 class="card-title mb-4">Today  Active Visitor</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal text-success"></i> {{ count($user)}}</h1>
                                 </h1>
                             
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                             
                               $user=DB::table('products')->get();
                                  
                                @endphp
                                <h5 class="card-title mb-4">Today  Product</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal text-success"></i> {{ count($user)}}</h1>
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

                                    $today=DB::table('orders')->where('status',3)->whereDay('created_at',today()->day)->get();
                                    foreach ($today as $value) {
                                    $today_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                
                                // {{-- Total Deliver in a yesterday  --}}
                                    
                                    $yesterday=DB::table('orders')->where('status',3)->whereDay('created_at',today()->subDays(1))->get();
                               
                              
    
                                    foreach ($yesterday as $value) {
                                    $yesterday_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                    
                                  
                                @endphp
                                <h5 class="card-title mb-4">Today Deliver</h5>
                                <h1 class="mt-1 mb-3"> 
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal @if($today_total>$yesterday_total)text-success   @else text-danger rotate @endif"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                                  </h1>
                              
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                                $today_total=0;
                                $yesterday_total=0;

                                    $today=DB::table('orders')->where('status',3)->whereMonth('created_at',today()->month)->get();
                                    foreach ($today as $value) {
                                    $today_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                
                                // {{-- Total order in a a previous  --}}
                                    
                                    $yesterday=DB::table('orders')->where('status',3)->whereMonth('created_at',today()->subMonth(1))->get();
                               
                              
    
                                    foreach ($yesterday as $value) {
                                    $yesterday_total+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                    
                                  
                                @endphp
                                <h5 class="card-title mb-4">This Month Deliver</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal @if($today_total>$yesterday_total)text-success   @else text-danger rotate @endif"></i> {{ __getPriceunit() .number_format($today_total,2) }}</h1>
                                  </h1>
                             
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                             
                               $user=DB::table('users')->get();
                                  
                                @endphp
                                <h5 class="card-title mb-4">Total Register Vendor</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal text-success"></i> {{ count($user)}}</h1>
                                 </h1>
                             
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                             
                               $user=DB::table('users')->get();
                                  
                                @endphp
                                <h5 class="card-title mb-4">Total  Active Visitor</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal text-success"></i> {{ count($user)}}</h1>
                                 </h1>
                             
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Total order in a Month --}}
                                @php
                             $totalsale=0;
                             $sale=DB::table('orders')->where('status',3)->get();
                                    foreach ($sale as $value) {
                                    $totalsale+=($value->total*$value->tax/100)+$value->total+$value->shipping_charge;
                                    }
                                  
                                @endphp
                                <h5 class="card-title mb-4">Total  Sales</h5>
                                <h1 class="mt-1 mb-3">
                                    <h1 class="mt-1 mb-3"><i class="fas fa-signal text-success"></i> {{__getPriceunit(). number_format($totalsale,2)}}</h1>
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
                    <div id="chartContainer1" style="height: 340px; width: 100%;"></div>

                </div>
            </div>
            <div class="card flex-fill w-100">
               
                <div class="card-body py-3">
                    <div id="chartContainer2" style="height: 340px; width: 100%;"></div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 ">
            <div class="card flex-fill w-100">
                <div id="chartContainer3" style="height: 340px; width: 100%;"></div>
              
            </div>
        </div>
     
     
    </div>
    {{-- Lastest order  --}}
@php
    $order=DB::table('orders')->orderBy('id','desc')->limit(10)->get();
@endphp


    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Latest Order</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th class="d-none d-xl-table-cell">Order Date</th>
                            <th class="d-none d-xl-table-cell">Payment Type</th>
                            <th class="d-none d-xl-table-cell">Total({{ __getPriceunit() }})</th>

                            <th>Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                        @php
                            $vat=($item->total*$item->tax)/100
                            
                        @endphp
                        <tr>
                            <td>{{ $item->tracking_code }}</td>
                            <td class="d-none d-xl-table-cell">{{carbon\carbon::parse( $item->created_at)->diffForHumans() }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->payment_type }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->total+$item->shipping_charge+$vat }}</td>

                            <td>
                                @if ($item->status==0)
                                <span class="badge bg-danger">Pending</span>
                                @elseif($item->status==1)
                                <span class="badge bg-primary">Processing</span>
                                @elseif($item->status==2)
                                <span class="badge bg-info">Shipping</span>
                                @elseif($item->status==3)
                                <span class="badge bg-success">Deliver</span>
                                @elseif($item->status==4)
                                <span class="badge bg-warning">Cancel</span>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell"><a href="{{route('admin.order.show',['id'=>$item->id])}}"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        @endforeach

                      
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
               
                <div class="card-body d-flex w-100">
                    <div id="chartContainer4" style="height: 340px; width: 100%;"></div>

                </div>
            </div>
        </div>
    </div>

</div>
<x-weekchart />
@endsection
