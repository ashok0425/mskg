@extends('admin.master')
@section('main-content')
@php
    define('PAGE','subscriber')
    
@endphp
<div class="container">
    <div class="card py-3 px-4">
            <h3>List of People Who want to contact</h3>
            
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>
                        status
                    </th>
                    <th>Message</th>


                    {{-- <th>Reply</th> --}}
            
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->fname}} {{$item->lname}}</td>

                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>@if ($item->status==0)
                            <div class="badge bg-warning">Not replied</div>
                            @else
                            <div class="badge bg-success">replied</div>

                        @endif</td>
                        <td>{{$item->msg}}</td>
{{-- 
                        <td>
                            <a  href="{{route('admin.contact.create',['id'=>$item->id])}}" class="btn btn-info"><i class="fas fa-plus"></i></a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection