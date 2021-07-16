@extends('admin.master')
@section('main-content')

@php
    define('PAGE','faq')
@endphp
<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>Faq Data</h3>
            <a href="{{route('admin.faq.create')}}" class="btn btn-info btn-lg" >Add Faq</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->title}}</td>
                   
                        <td>{{$item->desrc}}</td>

                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Active</a>
                            @else
                            <a class="btn btn-danger">Deactive</a>

                        @endif</td>
                        <td>
                         
                            <a href="{{route('admin.faq.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a id="delete" href="{{route('admin.faq.delete',['id'=>$item->id,'table'=>'faqs'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                            @if ($item->status==1)
                            <a href="{{route('admin.faq.deactive',['id'=>$item->id,'table'=>'faqs'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('admin.faq.active',['id'=>$item->id,'table'=>'faqs'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection