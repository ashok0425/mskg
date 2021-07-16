@extends('frontend.master')
@section('content')
<section class="section-content padding-y">

    <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
          <article class="card-body">
        <x-errormsg />
         
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

            <header class="mb-4"><h4 class="card-title">Sign Up As Vendor</h4></header>
            <form method="POST" action="{{ route('vendor.register') }}">
                @csrf
                        <div class="form-group">
                            <label>Full name <span class='text-danger'>*</span> </label>
                              <input type="text" class="form-control" placeholder="" name="name"   required value='{{old('name')}}'>
                        </div> <!-- form-group end.// -->
                      



                        <div class="form-row">
                            <div class="col form-group">
                                <label>Email <span class='text-danger'>*</span> </label>
                                  <input type="email" class="form-control" placeholder="" name="email" required value='{{old('email')}}'>
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Phone <span class='text-danger'>*</span> </label>
                                  <input type="number" class="form-control" placeholder="" name="phone" required value='{{old('phone')}}' minlength="10" maxlength="10">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                 
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Company Name
                                  <input type="company_name" class="form-control" placeholder="" name="company_name" required value='{{old('company_name')}}' >
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Pan no. 
                                  <input type="number" class="form-control" placeholder="" name="company_pan"  value='{{old('company_pan')}}' >
                            </div> <!-- form-group end.// -->
                        </div> 
                        <div class="form-row">
                            <div class="col form-group">
                                <label>State <span class='text-danger'>*</span> </label>
                                  <input type="text" class="form-control" placeholder="" name="state" required value='{{old('state')}}'>
                            </div> <!-- form-group end.// -->
                      
                        </div> 
                        <div class=" form-group">
                            <label>Full Address <span class='text-danger'>*</span> </label>
                              <textarea type="text" class="form-control" placeholder="" name="address" required >{{old('address')}}</textarea>
                        </div> <!-- form-group end.// -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password <span class='text-danger'>*</span> </label>
                            <input class="form-control" type="password" name="password" required >
                        </div> <!-- form-group end.// --> 
                        <div class="form-group col-md-6">
                            <label>Confirm password <span class='text-danger'>*</span> </label>
                            <input class="form-control" type="password" name="password_confirmation" required >
                        </div> <!-- form-group end.// -->  
                    </div>
                        
                    <div class="form-group"> 
                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I agree with the  <a href="{{route('term')}}">terms and conditions.</a>  </div>  <span class='text-danger'>*</span> </label>
                    </div> <!-- form-group end.// -->      
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                    </div> <!-- form-group// --> 

                </form>
            </article><!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Have an account? <a href="{{ route('login') }}">Log In</a></p>
        <br><br>
    <!-- ============================ COMPONENT REGISTER  END.// ================================= -->
    
    
    </section>
    @endsection