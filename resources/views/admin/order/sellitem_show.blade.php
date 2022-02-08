@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Today sell detail</h6>

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