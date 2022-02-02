@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">SELL Detail of order ID {{ $id }}</h6>

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
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total=0;
                @endphp
                @foreach ($order_detail as $order)
                @php
                    
                    $total+=$order->qty*$order->price;

                @endphp
                <tr>
                    <td><img src="{{ asset($order->image) }}" alt="" width="100"></td>
                    <td>{{ $order->name }}</</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->price*$order->qty }}</td>
                    <td>@if ($order->status==0)
                        <p class="py-0 my-0"><span class="badge bg-danger text-light">Pending</span></p> 

                       <a href="{{ route('admin.orders.status',['id'=>$order->id]) }}"><span class="badge bg-success text-light">Click if served</span></a> 

                        @else   
                        <a><span class="badge bg-success text-light">Served</span></a> 

                    @endif</td>


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
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
       </div>
   </div>
@endsection