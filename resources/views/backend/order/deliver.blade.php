@extends('admin.master')
@section('main-content')
@php
    define('PAGE','order')
@endphp

<div class="container">
    <div class="card py-3 px-4">
            <h3>Pending/New Order</h3>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Id</th>
                    <th>Amount({{ __getPriceunit() }})</th>
                    <th>Payment Type</th>
                    <th>Payment Id</th>
                    <th>IsPaid</th>
                    <th>Status</th>

                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($order as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tracking_code}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->payment_type}}</td>
                        <td>{{$item->payment_id}}</td>

                        <td>@if ($item->ispaid==1)
                            <span  class="badge bg-success">Paid</span>
                            
                            @else
                            <span class="badge bg-danger">Pending</span>

                        @endif</td>

                      
                            
                            <td>
                  
<form action="">
    
    <select name="status" id="status" class="form-control" data-id="{{ $item->id }}">


<option value="3" @if ($item->status==3)
    selected
@endif>
Deliver
</option>

    </select>
</form>
                        </td>
                        <td>
                            <a href="{{route('admin.order.show',['id'=>$item->id])}}" class="btn btn-info"><i class="far fa-eye"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection