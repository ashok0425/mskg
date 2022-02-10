@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Sold Item Detail</h6>

       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>qty</th>
                    <th>Total</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                @php
                    $total=0;
                @endphp
                @foreach ($order_detail as $order)
                @php

                    $qty=DB::table('order_details')->whereDate('created_at',today())->where('category_id',$order->category_id)->sum('qty');
                    $menu_id=DB::table('order_details')->whereDate('created_at',today())->where('category_id',$order->category_id)->groupBy('menu_id')->select('menu_id')->first();
                    foreach ($menu_id  as $value) {
                        $price=DB::table('order_details')->whereDate('created_at',today())->where('category_id',$order->category_id)->where('menu_id',$value->menu_id)->first();
                    }
                    
                    $image=DB::table('categories')->where('id',$order->category_id)->first();
                    $total+=$price->price*$qty

                @endphp

                <tr>
                    <td><img src="{{ asset($image->image) }}" alt="" width="100"></td>
                    <td>{{ $image->name }}</</td>
                    <td>{{ $price->price }}</td>
                    <td>{{ $qty }}</td>
                    <td>{{ $qty*$price->price }}</td>
                   
                    <td><a href="{{ route('admin.itemsell.show',['category_id'=>$order->category_id]) }}"  class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>


                </tr>
                @endforeach
            <tfoot>
                <tr>
                    <th>Total</th>
                   <th></th>
                   <th></th>
                   <th></th>

                    <th>{{ $total }}</th>
                    <th></th>
            <th></th>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
       </div>
   </div>
@endsection