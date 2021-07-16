@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','shop')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>Shop List</h3>
            <a href="{{route('vendor.shop.create')}}" class="btn btn-info btn-lg" >Add Shop</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Thumbnail Image</th>
                    <th>Cover Image</th>



                    <th>Status</th>

                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($shop as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>

                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                        <td> <img src="{{asset($item->cover)}}" width="80" alt=""></td>

                       
  
                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Active</a>
                            @else
                            <a class="btn btn-danger">Deactive</a>

                        @endif</td>
                      

                        <td>
                            {{-- <a href="{{route('admin.category.show',['id'=>$item->id])}}" class="btn btn-info"><i class="far fa-eye"></i></a> --}}

                            <a href="{{route('vendor.shop.edit',['id'=>$item->id])}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                            {{-- <a id="delete" href="{{route('admin.category.delete',['id'=>$item->id,'table'=>'categories'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a> --}}
                            @if ($item->status==1)
                            <a href="{{route('vendor.shop.deactive',['id'=>$item->id,'table'=>'shops'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('vendor.shop.active',['id'=>$item->id,'table'=>'shops'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection