@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','product')
@endphp

<div class="container">
    <h2>Product Attributes</h2>

<div class="card py-3 px-4">
<div class='row'>
<div class="col-md-6 border-right">
        <div class="d-flex justify-content-between">
            <h3>Color Data</h3>
            <a href="{{route('vendor.color.create',['id'=>$pid])}}" class="btn btn-info btn-lg" >Add Color</a>
        </div>
        <br>

        <table  class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Color</th>
                    <th>Image</th>
                    <th>Status</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($color as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->color}}
                            <div style="background: {{ $item->color }};width:50px;height:20px;"></div>
                        </td>
                        <td> <img src="{{asset($item->image)}}" width="80" alt=""></td>
                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Active</a>
                            @else
                            <a class="btn btn-danger">Deactive</a>

                        @endif</td>
                        <td>

                      <a href="{{route('vendor.color.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                      @if ($item->status==1)
                      <a href="{{route('vendor.productcolor.deactive',['id'=>$item->id,'table'=>'productcolors'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                      @else
                      <a href="{{route('vendor.productcolor.active',['id'=>$item->id,'table'=>'productcolors'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a> 
                      @endif
                         
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-between">
            <h3>Product Variation</h3>
            <a href="{{route('vendor.variation.create',['id'=>$pid])}}" class="btn btn-info btn-lg" >Add variation</a>
        </div>
        <br>
        <table  class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Variation</th>
                    <th>Price</th>
                    <th>Price After Comission</th>

                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($variation as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->variation}}
                            
                        </td>
                        <td>{{$item->price}}
                            
                        </td>
                        <td>{{$item->price_after_comission}}
                            
                        </td>
                        <td>@if ($item->status==1)
                            <a  class="btn btn-success">Active</a>
                            @else
                            <a class="btn btn-danger">Deactive</a>

                        @endif</td>
                        <td>

                      <a href="{{route('vendor.variation.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                      @if ($item->status==1)
                      <a href="{{route('vendor.productvariation.deactive',['id'=>$item->id,'table'=>'productvariations'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                      @else
                      <a href="{{route('vendor.productvariation.active',['id'=>$item->id,'table'=>'productvariations'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                         @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
        
    </div>
</div>
</div>
</div>



@endsection