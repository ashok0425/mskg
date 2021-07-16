@extends('admin.master')
@section('main-content')
@php
    define('PAGE','account')
@endphp

<div class="card">
        <h3>Payment Detail</h3>
   
    <div class="card-body">
  
        <form action="{{route('admin.payment.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @php
                $vendor=DB::table('users')->where('Isvendor',1)->get();
            @endphp
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Choose Vendor</label>
                        <select name="vendor" id="" required class="form-control">
                            <option value="" disabled>--select vendor--</option>
                        @foreach ($vendor as $item)
                        <option value="{{ $item->id}}" >{{ $item->name.','.$item->email }}</option>

                        @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control" value="{{old('amount')}}" required>
                     
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Payment Mode</label>
                        <input type="text" name="payment_mode" class="form-control" value="{{old('payment_mode')}}" required>
                     
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Scrrenshot</label>
                        <input type="file" name="file" class="form-control" value="{{old('file')}}" >
                     
                    </div>
                </div>
            </div>
           
         
           
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>
</div>
@endsection
