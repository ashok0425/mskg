@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','account')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>My Ticket List</h3>
            <a href="{{route('vendor.ticket.create')}}" class="btn btn-info btn-lg" >Create Ticket</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Amount</th>

            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($ticket as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->descr}}</td>
                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Replied</a>
                            @else
                            <a class="btn btn-danger">Pending</a>

                        @endif</td>
                     
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection