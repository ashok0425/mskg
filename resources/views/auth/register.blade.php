@extends('frontend.master')
@section('content')
<section class="section-content padding-y">

    <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
          <article class="card-body">
         
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <x-errormsg />

            <header class="mb-4"><h4 class="card-title">Sign up</h4></header>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                        <div class="form-group">
                            <label>Full name</label>
                              <input type="text" class="form-control" value="{{old('name')}}" name="name">
                        </div> <!-- form-group end.// -->
                      
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="" name="email" value="{{old('email')}}">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div> <!-- form-group end.// -->
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input class="form-control" type="password" name="password">
                        </div> <!-- form-group end.// --> 
                        <div class="form-group col-md-6">
                            <label>Confirm password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div> <!-- form-group end.// -->  
                    </div>
                        
                    <div class="form-group"> 
                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I agree with the  <a href="{{route('term')}}">terms and conditions.</a>  </div> </label>
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