@extends('frontend.master')
@section('content')
@php
    
    if(Auth::check()){
      $shop = DB::table('favourites')->join('shops','shops.id','favourites.shop_id')->where('user_id',Auth::id())->select('favourites.id as fid','shops.*')->orderBy('favourites.id','desc')->paginate(15);
    
  }
@endphp
<div class="container">
    <div class="card px-5 py-2">

<table id="myTable" class="table table-responsive-sm" >
    <thead>
        <tr>
            <th>#</th>

            <th>Date</th>
            <th>Name</th>
            <th>Address</th>
            <th>Image</th>
          
            <th>Action</th>


            
        </tr>
    </thead>
    <tbody>
        
        @foreach ($shop as $item)
            <tr> 
                <td>{{$loop->iteration}}</td>
                <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td><img src="{{asset($item->image)}}" alt="{{$item->image}}" width="70"></td>

               
<td>
<a href="{{ route('shop',['id'=>$item->fid,'name'=>$item->name]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
</td>
            
            </tr>
        @endforeach
    </tbody>
      </table>

    </div>
    {{$shop->links()}}
</div>
      @endsection