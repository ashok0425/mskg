@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','product')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>Product Data</h3>
            <a href="{{route('vendor.product.create')}}" class="btn btn-info btn-lg" >Add Product</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Shop</th>

                    <th>Category</th>
                    
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($product as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->sname}}</td>

                        <td>{{$item->category}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>



                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Active</a>
                            @else
                            <a class="btn btn-danger">Deactive</a>

                        @endif</td>
                        <td>
                            <a href="{{route('vendor.product.attribute',['id'=>$item->id])}}" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                            {{-- <a href="{{route('admin.product.show',['id'=>$item->id])}}" class="btn btn-info"><i class="far fa-eye"></i></a> --}}
                  
                      <a href="{{route('vendor.product.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            {{-- <a id="delete" href="{{route('admin.product.delete',['id'=>$item->id,'table'=>'products'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a> --}}
                            @if ($item->status==1)
                            <a href="{{route('vendor.product.deactive',['id'=>$item->id,'table'=>'products'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('vendor.product.active',['id'=>$item->id,'table'=>'products'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection