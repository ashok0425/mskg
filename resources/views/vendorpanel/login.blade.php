@extends('frontend.master')
@section('content')
<section class="section-conten padding-y" style="min-height:84vh">

	<!-- ============================ COMPONENT LOGIN   ================================= -->
		<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
<x-errormsg />

		  <div class="card-body">
		  <h4 class="card-title mb-4">Sign In As Vendor</h4>
		  <form action="{{ route('vendor.login') }}" method="POST">
			@csrf
			  <div class="form-group">
				 <input name="email" class="form-control" placeholder="Username" type="email" required>
			  </div> <!-- form-group// -->
			  <div class="form-group">
				<input name="password" class="form-control" placeholder="Password" type="password" required>
			  </div> <!-- form-group// -->
			  
			  <div class="form-group">
				  <a href="#" class="">Forgot password?</a> 
			
			  </div> <!-- form-group form-check .// -->
			  <div class="form-group">
				  <button type="submit" class="btn btn-primary btn-block"> Login  </button>
			  </div> <!-- form-group// -->    
		  </form>
		  </div> <!-- card-body.// -->
		</div> <!-- card .// -->
	
		 <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p>
		 <br><br>
	<!-- ============================ COMPONENT LOGIN  END.// ================================= -->
	
	
	</section>
@endsection