@extends('admin.master')
@section('main-content')
@php
    define('PAGE','coupon')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>Coupon Data</h3>
            <a href="{{route('admin.coupon.create')}}" class="btn btn-info btn-lg" >Add Coupon</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Coupon</th>
                    <th>Discount %</th>
                    <th>Cart Value</th>

                    <th>Expire At</th>
                    <th>Image</th>
                    <th>Status</th>


                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($coupon as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->coupon}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->card_value}}</td>
                        <td>{{$item->expire_at}}
                        @if ($item->expire_at<today())
                <span class="badge bg-danger ">Expired</span>
                           
                        @endif
                        </td>

                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                        <td>@if ($item->status==1)
                            <a  class="badge bg-success">Active</a>
                            @else
                            <a class="badge bg-danger">Deactive</a>

                        @endif</td>
                        <td>
                         
                            <a href="{{route('admin.coupon.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a id="delete" href="{{route('admin.coupon.delete',['id'=>$item->id,'table'=>'coupons'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                            @if ($item->status==1)
                            <a href="{{route('admin.coupon.deactive',['id'=>$item->id,'table'=>'coupons'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('admin.coupon.active',['id'=>$item->id,'table'=>'coupons'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection