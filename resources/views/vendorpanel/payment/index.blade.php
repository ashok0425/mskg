@extends('vendorpanel.master')
<style>
    h2{
        font-weight: 700;
        font-size: 1.2rem;

    }
    h2 span{
        color: rgb(4, 109, 109);
    }
</style>
@section('content')

@php
    define('PAGE','account')
@endphp

<div class="container">
    @php
       $sale=DB::table('order_details')->where('vendor_id',Auth::user()->id)->get();
        $totalsale=0;
        foreach ($sale as $value) {
           if($value->coupon){
            $totalsale+=$value->price_after_coupon;
           }else{
            $totalsale+=$value->price;

           }
        }
        $totalpaid=DB::table('payments')->where('vendor_id',Auth::user()->id)->sum('amount');

    @endphp
    <h2>Total Sale Amount : <span>{{ __getPriceunit() }} {{ number_format($totalsale)}}</span> </h2>
    <h2>Paid Amount : <span>{{ __getPriceunit() }} {{ number_format($totalpaid)}}</span> </h2>
    <h2>Pending Amount : <span> {{ __getPriceunit() }} {{ number_format($totalsale-$totalpaid)}}</span> </h2>


    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3>My Payment History</h3>
            <a href="{{route('vendor.ticket.create')}}" class="btn btn-info btn-lg" >Create Ticket</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Transcation Id</th>
                    <th>Payment Mode</th>
                    <th>Amount {{ __getPriceunit() }}</th>
                    <th>Payment Screenshot</th>

            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($payment as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\carbon::parse($item->date)->format('d F Y')}}<br>{{carbon\carbon::parse($item->time)->format('i -s -H')}}</td>
                        <td>{{$item->payment_id}}</td>
                        <td>{{$item->payment_mode}}</td>
                        <td>{{$item->amount}}</td>
                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                     
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection