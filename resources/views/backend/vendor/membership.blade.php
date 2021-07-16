@extends('admin.master')
@section('main-content')
@php
    define('PAGE','vmanagement')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        {{-- <div class="d-flex justify-content-between"> --}}
            <h3>Vendor List Applied For Memebership</h3>
            {{-- <a href="{{route('admin.banner.create')}}" class="btn btn-info btn-lg" ></a> --}}
        {{-- </div> --}}
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($vendor as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset($item->profile_photo_path)}}" alt="" width="70"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->company_address}}</td>


                        <td>@if ($item->membership==2)
                            <a  class="btn btn-success">Member</a>
                             @elseif($item->membership==3)
                            <a class="btn btn-danger">Reject</a>
                            @else
                            <a class="btn btn-danger">Pending</a>

                        @endif</td>
                        <td>
                            <a href="{{route('admin.vendor.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            @if ($item->membership==1)
                            <a href="{{route('admin.vendor.accept',['id'=>$item->id])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('admin.vendor.block',['id'=>$item->id])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection