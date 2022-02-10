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
                    $subtotal=DB::table('order_details')->whereDate('created_at',today())->where('category_id',$order->category_id)->sum('total');

                    $image=DB::table('categories')->where('id',$order->category_id)->first();
                    $total+=$subtotal;

                @endphp
                <tr>
                    <td><img src="{{ asset($image->image) }}" alt="" width="100"></td>
                    <td>{{ $image->name }}</</td>
                    <td>{{ $qty }}</td>
                    <td>{{ $subtotal }}</td>
                   
                    <td><a href="{{ route('admin.itemsell.show',['category_id'=>$order->category_id]) }}"  class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>


                </tr>
                @endforeach
            <tfoot>
                <tr>
                    <th>Total</th>
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