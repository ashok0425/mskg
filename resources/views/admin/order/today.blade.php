@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Today Sell'S Data</h6>

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
                    <th>SOLD ON</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total=0;
                    $paid=0;
                    $exchange=0;
                    $discount=0;

                @endphp
                @foreach ($orders as $order) 
                @php
                    $total=$total+$order->actual_amount;
                    $paid=$total+$order->paid;
                    $exchange=$total+$order->exchange;
                    $discount=$total+$order->discount;

                @endphp 
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->type=='0'?'Table':'Room' }}</td>
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
                    <td>
                        {{ Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                    </td>
                    {{-- <td>@if ($order->status==0)
                        <p class="py-0 my-0"><span class="badge bg-danger text-light">Pending</span></p> 

                       <a href="{{ route('admin.orders.status',['id'=>$order->id]) }}"><span class="badge bg-success text-light">Click if served</span></a> 

                        @else   
                        <a><span class="badge bg-success text-light">Served</span></a> 

                    @endif</td> --}}
                    <td><a href="{{ route('admin.orders.show',$order->id) }}"  class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>
                        {{-- <a href="{{ route('admin.menus.delete',['id'=>$order->id]) }}"  class="delete_row btn btn-danger btn-circle"><i class="fas fa-trash"></i></a> --}}
                    </td>

                </tr>
                @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>{{$total}}</td>
                    <td>{{$paid}}</td>
                    <td>{{$exchange}}</td>
                    <td>{{$discount}}</td>



                </tr>
            </tfoot>
        </table>
    </div>
       </div>
   </div>
@endsection