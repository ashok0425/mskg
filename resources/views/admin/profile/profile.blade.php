
@extends('admin.layout.master')

@section('content')



<div class="container">


    <div class="row">
        <div class="col-md-8  offset-md-2">
            <div class="card mb-3">
             

                <div class="card-header font-weight-bold ">

                    <h6 class="text-primary mb-0">Update Profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.profile')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group mt-2">

                            <label for="">Email</label>
                            <input type="email" value="{{ __getAdmin()->email }}" class="form-control" name="email" required>

                        </div>
                        <div class="form-group mt-2">

                            <label for="">Name</label>
                            <input type="text" value="{{ __getAdmin()->name }}" class="form-control" name="name" required>

                        </div>
                        <div class="form-group mt-2">

                            <div class="custom-file">
                                <input type="file"  class="custom-file-input" id="inputGroupFile01" name="file">
                               <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                               </div>
                               <a href="{{ asset(__getAdmin()->profile_photo_path) }}" target="_blank">
                               <img src="{{ asset(__getAdmin()->profile_photo_path) }}" alt="" width="100">
            
                               </a>
                        </div>
                        <div class="form-group mt-2">
                        <input type="submit" value="save" class="form-control btn btn-primary">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


                @endsection