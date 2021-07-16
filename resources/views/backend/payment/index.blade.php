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
    <div class="card pt-1 pb-3 px-2">
        <form action="{{route('admin.payment.export')}}">
        <div class="row">
            @php
               
               $vendor=DB::table('users')->where('phone','!=',null)->get();
           @endphp
            <div class="col-md-3">
                <label>Select vendor</label>
               <select name="vendor"  class=" vendor form-control">
                <option value="" >N/A</option>

                   @foreach ($vendor as $item)
                   <option value="{{ $item->id }}" >{{$item->name}}</option>
                       
                   @endforeach
               </select>
            </div>
    
    <div class="col-md-3">
        <label>Payment Type</label>
       <select name="status" id="stat" class="form-control">
           @php
               
               $ptype=DB::table('payments')->select('payment_mode')->groupBy('payment_mode')->get();
           @endphp
           <option  value="">N/A</option>
           @foreach ($ptype as $item)
           <option value="{{$item->payment_mode}}" >{{$item->payment_mode}}</option>
               
           @endforeach
      
          

               
       
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
                <input type="submit"  id="search" class="btn btn-danger form-control" value="search">
                    
            </div>
<div class="col-md-4">
    <label ></label>
<br>
    <button  type="submit" class="btn btn-info">Export Payment History To Excel File</button>
</div>
        </div>
    </form>
    </div>
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
                    <th>Transcation Id</th>
                    <th>Name</th>

                    <th>Payment Mode</th>
                    <th>Amount {{ __getPriceunit() }}</th>
                    <th>Payment Screenshot</th>

            
                </tr>
            </thead>
            <tbody class="filter_result">
                
                @foreach ($payment as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\carbon::parse($item->date)->format('d F Y')}}<br>{{carbon\carbon::parse($item->time)->format('i -s -H')}}</td>
                        <td>{{$item->payment_id}}</td>
                        <td>{{$item->name}}
                            <a href="{{route('admin.vendor.edit',['id'=>$item->vid])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        
                        </td>

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
    url:'{{ url('admin/payment/filter') }}/',
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

    </script>
@endpush