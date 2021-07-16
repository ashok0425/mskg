@extends('vendorpanel.master')
@section('content')
@php
    define('PAGE','order')
@endphp

<div class="container">
    <div class="card pt-1 pb-3 px-2">
        <form action="{{route('vendor.order.export')}}" method="GET">
            @csrf
        <div class="row">
      
            <div class="col-md-3">
                <label>Quantity</label>
                <input type="number" name="vendor" class="form-control vendor">
            </div>
    
    <div class="col-md-3">
        <label>Status</label>
       <select name="status" id="stat" class="form-control">
           <option  value="">N/A</option>
           <option value="0" >Pending</option>
      
           <option value="1" >Processing</option>
           <option value="2" >Shipping</option>

           <option value="3" >Delivered</option>
           <option value="4" >Cancel</option>

               
       
       </select>
    </div>
            <div class="col-md-3">
                <label>Date From</label>
                <input type="date" name="from" id="from" class="form-control"  value="<?php echo date('Y-m-d'); ?>" >
            </div>
            <div class="col-md-3">
                <label>Date To</label>
                <input type="date" name="to" id="to" class="form-control"   value="<?php echo date('Y-m-d'); ?>"  >
            </div>
            <div class="col-md-3">
                <label ></label>
                <input type="button"  id="search" class="btn btn-danger form-control" value="search">
                    
            </div>
            <div class="col-md-3">
                <label ></label>
                <input type="submit"   class="btn btn-info form-control" value="Export in Excel">
                    
            </div>

        </div>
    </form>
    </div>
    <div class="card px-0">
            <h3>All Order</h3>
        <br>
     
        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order <br> Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price ({{__getPriceunit()}})</th>
                    <th>Qty</th>
                    <th>Total ({{__getPriceunit()}})</th>
                    <th>Status</th>
                    <th>Date</th>


            
                </tr>
            </thead>
            <tbody class="filter_result">
                
                @foreach ($order as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tracking_code}}</td>


                        <td><img src="{{asset($item->image)}}" alt="{{$item->name}}" width="60"> </td>
                        <td>{{$item->name}}
                                <p class="py-0 my-0">color:<span style="width:50px;height:20px;background:{{ $item->color }};padding:3px 5px;color:#fff;">{{ $item->color }}</span></p>
                            
                                               <p class="py-0 my-0">Size: {{$item->size}}</p>
                            <a href="{{route('vendor.product.edit',['id'=>$item->pid])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        </td>
                        <td>
                            @if($item->coupon)
                           <div class="row">
                               <div class="col-md-8">
                            
                            
                                <p class="py-0 my-0">Actual price:</p>
                               <p class="py-0 my-0"> Coupon({{$item->coupon}})</p>
                               <p class="py-0 my-0"> Price after coupon</p>

                               </div>
                               <div class="col-md-4">
                                <p class="py-0 my-0"><b>{{number_format($item->actual_price,2)}}</b></p>
                                
                                   <p class="py-0 my-0"><b>{{$item->coupon_value}}</b> %</p>

                                <b>{{number_format($item->price,2)}}</b>

                               </div>
                           </div>
                           @else 
                           <div class="row">
                            <div class="col-md-8">
                         
                         
                             <p class="py-0 my-0">Actual price:</p>
                            

                            </div>
                            <div class="col-md-4">
                             <p class="py-0 my-0"><b>{{$item->actual_price}}</b></p>

                            </div>
                        </div>          
@endif
                          
                        </td>

                        <td>{{$item->qty}}</td>
                       

                        <td>
                          
                            {{number_format($item->price *$item->qty,2 )}}

                        </td>

                        <td>
                            @if ($item->status==0)
                            <span class="badge text-white bg-danger">
                                Pending                  
                            </span>
                            @endif
                                    
                            @if ($item->status==1)
                            <span class="badge text-white bg-primary">
                                        Proccessing            
                            </span>
                            @endif
                            @if ($item->status==2)
                            <span class="badge text-white bg-info">
                                Shipping                     
                            </span>
                            @endif @if ($item->status==3)
                            <span class="badge text-white bg-success">
                                Delivery                   
                            </span>
                            @endif @if ($item->status==4)
                            <span class="badge text-white bg-danger">
                                Cancel                    
                            </span>
                            @endif
                        </td>
                        <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>




@endsection

@push('scripts')
<script>

// search vendor 
$(document).on('click','#search',function(e) {
    e.preventDefault()
   let _token=$('meta[name=csrf-token]').attr('content')
 let $vendor=$('.vendor').val();
 let $status=$('#stat').val();
 let $from=$('#from').val();
 let $to=$('#to').val();
$.ajax({
    url:'{{ url('vendor/order/filter') }}/',
    type:'POST',
    beforeSend:function(){
  
  $(".loading").css("display",'block');

},
    data:{from:$from,to:$to,vendor:$vendor,status:$status,_token:_token},
    success:function(data){
        console.log(data);
        $('.filter_result').html(data)
    },
  complete:function(){
			  $(".loading").css('display','none');
  }
})


})

$('#ischeck').click(function(){
    if ($(this).prop('checked')){
    $('.check').attr('checked','checked')
  }else{
    $('.check').removeAttr('checked','fg')

  }
})
</script>


@endpush
