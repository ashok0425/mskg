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
                    <th>OrderID</th>
                    <th>Amount</th>
                    <th>Paid Amount</th>
                    <th>Exchange Amount</th>
                    <th>Discount</th>
                    <th>SOLD ON</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    
                <tr>
                    <td>{{ $order->order_id }}</td>
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
                    <td><a href="{{ route('admin.orders.show',$order->order_id) }}"  class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>
                        {{-- <a href="{{ route('admin.menus.delete',['id'=>$order->id]) }}"  class="delete_row btn btn-danger btn-circle"><i class="fas fa-trash"></i></a> --}}
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
       </div>
   </div>
@endsection