@extends('admin.master')
@section('main-content')
@php
    define('PAGE','device')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>Subcategory List</h3>
            <a href="{{route('admin.subcategory.create')}}" class="btn btn-info btn-lg" >Add Subcategory</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Subcategory</th>

                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($subcategory as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->cat->category}}</td>
                        <td>{{$item->subcategory}}</td>

                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Active</a>
                            @else
                            <a class="btn btn-danger">Deactive</a>

                        @endif</td>
                        <td>
                            <a href="{{route('admin.subcategory.show',['id'=>$item->id])}}" class="btn btn-info"><i class="far fa-eye"></i></a>

                            <a href="{{route('admin.subcategory.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a href="{{route('admin.subcategory.delete',['id'=>$item->id,'table'=>'subcategories'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                            @if ($item->status==1)
                            <a href="{{route('admin.subcategory.deactive',['id'=>$item->id,'table'=>'subcategories'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('admin.subcategory.active',['id'=>$item->id,'table'=>'subcategories'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection