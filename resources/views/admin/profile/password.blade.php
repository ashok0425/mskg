
@extends('admin.layout.master')

@section('content')



<div class="container">


    <div class="row">
        <div class="col-md-6  col-xl-4 offset-md-3">
            <div class="card mb-3">
             

                <div class="card-header font-weight-bold ">

                    <h6 class="text-primary mb-0">Change Password</h6>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.password')}}" method="POST">
                        @csrf
                        <div class="form-group mt-2">

                            <label for="">Current password</label>
                            <input type="password" value="" class="form-control" name="currentpassword" required>

                        </div>
                        <div class="form-group mt-2">

                            <label for="">New password</label>
                            <input type="password" value="" class="form-control" name="newpassword" required>

                        </div>
                        <div class="form-group mt-2">

                            <label for="">Confirm password</label>
                            <input type="password" value="" class="form-control" name="confirmpassword" required>

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