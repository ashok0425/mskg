@extends('admin.master')
@section('main-content')
@php
    define('PAGE','order')
@endphp

<div class="container">
    <div class="card pt-1 pb-3 px-2">
        <form action="{{route('admin.order.export')}}" method="GET">
            @csrf
        <div class="row">
      
            <div class="col-md-3">
                <label>Payment Type</label>
                <select name="vendor"  class="vendor form-control">
                    <option value="cod" >COD</option>
                    <option value="esewa" >Online</option>

                   </select>
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
       
        <table id="myTable" class="table table-responsive-sm " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Id</th>
                    <th>Amount({{ __getPriceunit() }})</th>
                    <th>Payment Type</th>
                    <th>Payment Id</th>
                    <th>IsPaid</th>
                    <th>Status</th>

                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody class="filter_result">
                
                @foreach ($order as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tracking_code}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->payment_type}}</td>
                        <td>{{$item->payment_id}}</td>

                        <td>@if ($item->ispaid==1)
                            <span  class="badge bg-success">Paid</span>
                            
                            @else
                            <span class="badge bg-danger">Pending</span>

                        @endif</td>

                      
                            
                            <td>
                  
<form action="">
    
    <select name="status" id="status" class="form-control" data-id="{{ $item->id }}">
<option value="0" @if ($item->status==0)
    slected
@endif>
Pending
</option>

<option value="1" @if ($item->status==1)
    selected
@endif>
Processing
</option>
<option value="2" @if ($item->status==2)
    selected
@endif>
Shipping
</option>
<option value="3" @if ($item->status==3)
    selected
@endif>
Deliver
</option>
<option value="4" @if ($item->status==4)
    selected
@endif>
Cancel
</option>
    </select>
</form>
                        </td>
                        <td>
                            <a href="{{route('admin.order.show',['id'=>$item->id])}}" class="btn btn-info"><i class="far fa-eye"></i></a></td>
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
    url:'{{ url('admin/order/filter') }}/',
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
