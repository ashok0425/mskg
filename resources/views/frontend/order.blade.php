@extends('frontend.master')
@section('content')


<div class="container mt-5">
    <h2 class="border-bottom mb-5 pb-2">My order List</h2>
    <div class="card py-3 px-4">
        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>

                    <th>Date</th>
                    <th>Tracking ID</th>
                    <th>Total Price  ({{ __getPriceunit() }})</th>
                    <th>Payment Method</th>
                  
                    <th>Status</th>
                    <th>Action</th>

  
                    
                </tr>
            </thead>
            <tbody>
                
                @foreach ($order as $item)
                    <tr> 
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                        <td>{{$item->tracking_code}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->payment_type}}</td>

                        <td>
                    @if ($item->status==0)
                    <span class="badge text-white bg-danger">
                         In review                  
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
                       
<td>
    <a href="{{ route('order.show',['id'=>$item->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
</td>
                    
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection