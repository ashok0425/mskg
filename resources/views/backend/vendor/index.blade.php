@extends('admin.master')
@section('main-content')
@php
    define('PAGE','vmanagement')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        {{-- <div class="d-flex justify-content-between"> --}}
            <h3>Vendor List</h3>
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


                        <td>@if ($item->Isvendor==1)
                            <a  class="badge bg-success">Accepted</a>
                            @else
                            <a class="badge bg-danger">Pending</a>

                        @endif
                        @if ($item->status==1)
                        <a  class="badge bg-success">Activated</a>
                        @else
                        <a class="badge bg-danger">Blocked</a>

                    @endif
                
                    
                    </td>
                        <td>
                            <a href="{{route('admin.vendor.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection

