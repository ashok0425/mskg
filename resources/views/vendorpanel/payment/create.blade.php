@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','account')
@endphp

<div class="card">
        <h3>Create New Ticket</h3>
   
    <div class="card-body">
  
        <form action="{{route('vendor.ticket.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Ticket Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Desciption</label>
                       <textarea name="description" id="" required class="form-control">
{{ old('description') }}

                       </textarea>
                    </div>
                </div>
            </div>
           
         
           
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
