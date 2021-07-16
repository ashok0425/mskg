@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','product')
@endphp

<div class="container">
    <div class="card">
            <h3>Contact list Data</h3>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Title</th>

                    <th>Message</th>
                    <th>Status</th>

                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->title}}</td>

                        <td>{{$item->message}}</td>



                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Replied</a>
                            @else
                            <a class="btn btn-danger">Pending</a>

                        @endif</td>
                        <td>
                    
                            @if ($item->status==1)
                            <a href="{{route('vendor.contactlist.deactive',['id'=>$item->id,'table'=>'contactvendors'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                            @else
                            <a href="{{route('vendor.contactlist.active',['id'=>$item->id,'table'=>'contactvendors'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                            @endif
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection