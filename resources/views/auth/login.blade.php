        @extends('frontend.master')
     @php
         
         if(!session()->has('url'))
    {
      session()->put('url', url()->previous());
    }
   
     @endphp
        @section('content')
        <section class="section-conten padding-y" style="min-height:84vh">
        
            <!-- ============================ COMPONENT LOGIN   ================================= -->
                <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
                  
        
                  <div class="card-body">
        <x-errormsg />
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
                  <h4 class="card-title mb-4">Sign In </h4>
                  <a href="{{url('auth/facebook')}}" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp;  Sign in with Facebook</a>
                    <a href="{{ url('auth/google') }}" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp;  Sign in with Google</a>
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                      <div class="form-group">
                         <input name="email" class="form-control" placeholder="Username" type="email" required>
                      </div> <!-- form-group// -->
                      <div class="form-group">
                        <input name="password" class="form-control" placeholder="Password" type="password" required>
                      </div> <!-- form-group// -->
                      
                      <div class="form-group">
                        <a href="{{ route('password.request') }}" class="float-right av" style="color:#005aa6!important;">Forgot password?</a>
                        <label class="remember-field">
                            <input class="frm-input " id="remember_me" type="checkbox" class="form-checkbox" name="remember"><span class="av"  style="color:#005aa6!important;">&nbsp; Remember me</span>
                        </label>
                    </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                      </div> <!-- form-group// -->    
                  </form>
                  </div> <!-- card-body.// -->
                </div> <!-- card .// -->
            
                 <p class="text-center mt-4">Don't have account? <a href="{{ route('register') }}">Sign up</a></p>
                 <br><br>
            <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
            
            
            </section>
        @endsection
