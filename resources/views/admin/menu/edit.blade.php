@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Edit  Menu </h6>

       </div>
      <x-errormsg/>
       <div class="card-body">
       <form action="{{ route('admin.menus.update',$menu) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
           <div class="row">
               <div class="col-md-6 mt-3">
                   <label for="name">Name</label>
                   <input type="text" name="name" id="" class="form-control" placeholder="Enter menu name" value="{{ $menu->name }}" required>
               </div>
               <div class="col-md-6 mt-3">
                <label for="name">Menu No</label>
                <input type="text" name="menu_no" id="" class="form-control" placeholder="Enter menu name" value="{{ $menu->menu_no }}" required readonly>
            </div>
               <div class="col-md-6 mt-3">
                <label for="name">Price</label>
                <input type="text" name="price" id="" class="form-control" placeholder="Enter menu price" value="{{ $menu->price }}" required>
            </div>
            <div class="col-md-6 mt-3">
                <label for="name">Image</label>
                <div class="custom-file">
                    <input type="file"  class="custom-file-input" id="inputGroupFile01" name="file">
                   <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                   </div>
                   <a href="{{ asset($menu->image) }}" target="_blank">
                   <img src="{{ asset($menu->image) }}" alt="" width="100">

                   </a>
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