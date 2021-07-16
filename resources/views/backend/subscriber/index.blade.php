@extends('admin.master')
@section('main-content')
@php
    define('PAGE','subscriber')
    
@endphp
<div class="container">
<form action="{{ route('admin.subscriber.selectedmail') }}" method="POST">
@csrf
    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            {{-- <input type="submit" value="Send Email to selected Subscriber" class="btn btn-primary"> --}}
            {{-- <a href="{{route('admin.sendmail')}}" class="btn btn-info btn-lg" >Send Email To All</a> --}}
        </div>
        <br>
        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>Checked</th>
                    <th>#</th>

                    <th>Email</th>
                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($subscriber as $item)
                    <tr>
                        <td><input type="checkbox" name="subscriber[]" value="{{ $item->email }}"></td>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a id="delete" href="{{route('admin.subscriber.delete',['id'=>$item->id,'table'=>'subscribers'])}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                           
                          
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</form>

</div>



@endsection