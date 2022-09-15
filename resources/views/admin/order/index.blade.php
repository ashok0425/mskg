@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">SELL'S Data</h6>
    <form action="{{ route('admin.orders.index') }}" method="get">
<div class="d-flex justify-content-between">

    <input type="date" name="from" id="" class="form-control" required >
    <input type="date" name="to" id="" class="form-control" required >

    <input type="submit" name="" id="" class="form-control btn btn-primary">
</div>

</form>

       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Bill No</th>
                    <th>Room/Table</th>
                    <th>Room/Table <br> Type</th>


                    <th>Amount</th>
                    <th>Paid Amount</th>
                    <th>Exchange Amount</th>
                    <th>Discount</th>
                    <th> Mode</th>
                    <th>SOLD ON</th>  

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total_amount=0;
                    $total_paid=0;
                    $total_exchange=0;
                    $total_discount=0;


                @endphp
                @foreach ($orders as $order)
                    @php
                        $total_amount+=$order->actual_amount;
                    $total_paid+=$order->paid;
                    $total_exchange+=$order->exchange;
                    $total_discount+=$order->discount;
                    @endphp
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>
                        @if ($order->type==0)
                            Table
                        @endif
                        @if ($order->type==1)
                        Room
                    @endif

                    @if ($order->type==2)
                    Cabin
                @endif

                @if ($order->type==3)
                Online
            @endif
                    </td>

                    <th>{{ $order->actual_amount }}</th>

                    <td>{{ $order->paid }}</</td>
                    <td>{{ $order->exchange }}</td>
                    <td>
                        @if ($order->discount!=0)
                        {{ $order->discount }}
                        @else 
                        N/A
                        @endif
                      </td>

                      <td>@if ($order->payment_mode==0)
                        <p class="py-0 my-0"><span class="badge bg-success text-light">Offline</span></p> 


                        @else   
                        <a><span class="badge bg-success text-light">Online</span></a> 

                    @endif</td>

                    <td>
                        {{ Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                    </td>
                    <td><a href="{{ route('admin.orders.show',$order->id) }}"  class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>
                        {{-- <a href="{{ route('admin.orders.status',['id'=>$order->id]) }}"  class="delete_row btn btn-danger btn-circle"><i class="fas fa-thumb"></i></a> --}}
                    </td>

                </tr>
                @endforeach
<tfoot>
    <tr>
        <th>Total</th>
        <th></th>
        <th></th>
        <th>{{ $total_amount }}</th>
        <th>{{ $total_paid }}</th>
        <th>{{ $total_exchange }}</th>
        <th>{{ $total_discount}}</th>
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