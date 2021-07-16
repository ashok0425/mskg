@extends('admin.master')
@section('main-content')
<style>
    h2{
        font-weight: 700;
        font-size: 1.2rem;

    }
    h2 span{
        color: rgb(4, 109, 109);
    }
</style>
@php
    define('PAGE','account')
@endphp

<div class="container">
    {{-- @php
        $totalsale=DB::table('order_details')->where('vendor_id',Auth::user()->id)->sum('price');
        $totalpaid=DB::table('payments')->where('vendor_id',Auth::user()->id)->sum('amount');

    @endphp
    <h2>Total Sale Amount : <span>{{ __getPriceunit() }} {{ $totalsale}}</span> </h2>
    <h2>Paid Amount : <span>{{ __getPriceunit() }} {{ $totalpaid}}</span> </h2>
    <h2>Pending Amount : <span> {{ __getPriceunit() }} {{ $totalsale-$totalpaid}}</span> </h2> --}}


    <div class="card py-3 px-4">
        <div class="d-flex justify-content-between">
            <h3> Payment History</h3>
            <a href="{{route('admin.payment.create')}}" class="btn btn-info btn-lg" >Make Payment</a>
        </div>
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>

                    <th>Amount {{ __getPriceunit() }}</th>

            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($payment as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\carbon::parse($item->date)->format('d F Y')}}</td>
                        <td>{{$item->name}}
                            <a href="{{route('admin.vendor.edit',['id'=>$item->vid])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        
                        </td>

                        <td>{{$item->total}}</td>
                     <td>
                        <a href="{{route('admin.vendor.payment.show',['id'=>$item->vid])}}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                     </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection