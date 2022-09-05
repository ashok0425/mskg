@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Create New  </h6>

       </div>
      <x-errormsg/>
       <div class="card-body">
       <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
           <div class="row">
               <div class="col-md-6 mt-3">
                   <label for="name">Name</label>
                   <input type="text" name="name" id="" class="form-control" placeholder="Enter Table/ Room" value="{{ old('name') }}" required>
               </div>
               <div class="col-md-6 mt-3">
                <label for="name">Type</label>
               <select name="type" id="" required class="form-control">
                   <option value="">--select Type--</option>
                   <option value="0">Table</option>
                   <option value="1">Room</option>
                       
               </select>
            </div>
              
            <div class="col-md-6 mt-3">
                <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Save</span>
                </button>
            </div>
           </div>
       </form>
       </div>
   </div>
@endsection