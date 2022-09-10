@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Create New Category </h6>

       </div>
      <x-errormsg/>
       <div class="card-body">
       <form action="{{ route('admin.code') }}" method="POST" enctype="multipart/form-data">
        @csrf
           <div class="row">
               <div class="col-md-6 mt-3">
                   <input type="text" name="code" id="" class="form-control" placeholder="Enter Code" value="{{ $code }}" required>
               </div>
               <div class="col-md-6 mt-3">
         <button class="btn btn-primary btn-block">Save</button>
               </div>
               
           </div>
       </form>
       </div>
   </div>
@endsection