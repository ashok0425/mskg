@extends('frontend.master')
@section('content')






<div class="container my-5">

    <div class="row">
        <div class="col-md-6 offset-3">
<p>
  Enter your email address and we'll send you a link to reset your password.
</p>
   
<center>
  
    <form action="{{ route('password.email') }}" method="POST">
        @if (session('status'))
        <div class="mb-4 font-medium text-success">
            {{ session('status') }}
        </div>
        @endif
        @csrf
        <div class="form-group mt-2">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp"  required e>
            @error('email')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
            @enderror

        </div>
        <div class="form-group mt-3">
            <input type="submit" value="Send Link" class="form-control btn btn-info">
        </div>
    </form>
</center>
</div>
</div>
</div>
@endsection