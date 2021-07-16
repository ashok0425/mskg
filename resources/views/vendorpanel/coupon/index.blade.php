@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','coupon')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>Coupon Data</h3>
            <a href="{{route('vendor.coupon.create')}}" class="btn btn-info btn-lg" >Add Coupon</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Coupon</th>
                    <th>Discount %</th>
                    {{-- <th>Cart Value</th> --}}

                    <th>Expire At</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Approved Status</th>


                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($coupon as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->coupon}}</td>
                        <td>{{$item->price}}</td>
                        {{-- <td>{{$item->card_value}}</td> --}}
                        <td>{{carbon\carbon::parse($item->expire_at)->format('d F Y')}}
                        @if ($item->expire_at<today())
                <span class="badge bg-danger ">Expired</span>
                           
                        @endif
                        </td>

                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                        <td>@if ($item->status==1)
                            <a  class="badge bg-success">Activated</a>
                          
@else 
<a class="badge bg-danger">Deactive</a>

                        @endif</td>

                        <td>@if ($item->Isapproved==1)
                            <a  class="badge bg-success">Approved</a>
                            @elseif($item->Isapproved==2)
                            <a class="badge bg-danger">Reject</a>
@else 
<a class="badge bg-danger">Pending</a>

                        @endif</td>
                        <td>
                         
                            <a id="delete" href="{{route('vendor.coupon.delete',['id'=>$item->id,'table'=>'vendorcoupons'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                            @if ($item->status==1)
                            <a href="{{route('vendor.coupon.deactive',['id'=>$item->id,'table'=>'vendorcoupons'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('vendor.coupon.active',['id'=>$item->id,'table'=>'vendorcoupons'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection