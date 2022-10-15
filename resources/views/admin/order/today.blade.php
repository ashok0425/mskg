@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Today Sell'S Data</h6>

       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Bill No</th>
                    <th>Room/Table</th>
                    <th> Type</th>
                    <th>Amount</th>
                    <th>Paid Amount</th>
                    <th>Ex Amount</th>
                    <th>Discount</th>
                    <th>SOLD ON</th>
                    <th>Status</th>
                    <th> Mode</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total=0;
                    $paid=0;
                    $exchange=0;
                    $discount=0;

                @endphp
                @foreach ($orders as $order) 
                @php
                    $total=$total+$order->actual_amount;
                    $paid=$paid+$order->paid;
                    $exchange=$exchange+$order->exchange;
                    $discount=$discount+$order->discount;

                @endphp 
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>
                        @if ($order->type==0)
                            Table
                        @endif
                        @if ($order->type==1)
                        Room
                    @endif

                    @if ($order->type==2)
                    Cabin
                @endif

                @if ($order->type==3)
                Online
            @endif
                    </td>
                    <th>{{ $order->actual_amount }}</th>

                    <td>{{ $order->paid }}</</td>
                    <td>{{ $order->exchange }}</td>
                    <td>
                        @if ($order->discount!=0)
                        {{ $order->discount }}
                        @else 
                        N/A
                        @endif
                      </td>
                    <td>
                        {{ Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                    </td>
                    <td>@if ($order->status==0)
                        <p class="py-0 my-0"><span class="badge bg-danger text-light">unpaid</span></p> 


                        @else   
                        <a><span class="badge bg-success text-light">paid</span></a> 

                    @endif</td>

                    <td>@if ($order->payment_mode==0)
                        <p class="py-0 my-0"><span class="badge bg-success text-light">Offline</span></p> 


                        @else   
                        <a><span class="badge bg-success text-light">Online</span></a> 

                    @endif</td>
                    <td class="d-flex"><a href="{{ route('admin.orders.show',$order->id) }}"  class="btn btn-primary btn-circle"><i class="fas fa-eye"></i></a>
                        @if ($order->status==0)
                        <button data-href="{{ route('admin.orders.edit',['id'=>$order->id]) }}"  class=" btn btn-primary btn-circle open_modal" data-toggle="modal" data-target="#exampleModal" data-total="{{$order->actual_amount}}" data-order_id="{{$order->id}}"><i class="fas fa-edit"></i></button>
                        @endif
                    </td>

                </tr>
                @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>{{$total}}</td>
                    <td>{{$paid}}</td>
                    <td>{{$exchange}}</td>
                    <td>{{$discount}}</td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            </tfoot>
        </table>
    </div>
       </div>
   </div>



{{-- edit model  --}}


    {{-- modal for bill payment --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input type="hidden" id="order_id" >
            <div class="modal-body">
                <table class="w-100">

                    <tr>
                        <th>Total
                        </th>
                        <th> Rs<span id="total_amount"> </span></th>
                    </tr>
                    <tr>
                        <th> Have Discount ? 
                            <select name="" id="discount_type">
                            <option value="0">Percent</option>
                            <option value="1">Rupees</option>

                        </select>
                        </th>
                        <th> <input type="number" id="discount_amount"  placeholder="Discount in % (only if any)" autocomplete="off" class=" form-control"  name="discount" value="0"></th>
                    </tr>
            
                  
                    <tr>
                        <th> Payment Mode 
                          
                        </th>
                        <th>
                            <select name="" id="payment_type" class="form-control">
                                <option value="1">Offline</option>
                                <option value="0">Online</option>
    
                            </select>
                        </th>
                    </tr>
            
            
                    <tr style="margin-top:1rem!important;">
                        <th>Amount Received</th>
                        <th><input type="number" id="paid_amount" autocomplete="off" class="w-100 form-control" min="1"></th>
                    </tr>
                    <tr style="margin-top:1rem!important;">
            
                        <th>Amount Change</th>
                        <th ><input type="text" id="exchange_amount" autocomplete="off" readonly class="w-100 form-control" min="1"></th>
                    </tr>
            
                    <tr style="margin-top:1rem!important;" class="d-none security_code_wrapper">
            
                        <th colspan="2" class="d-flex w-100"><input type="password" id="security_code" autocomplete="off"  class="w-100 form-control " min="1" placeholder="Enter  Code For Discount">
                        <button class="btn btn-primary"  id="security_code_btn">verify</button>
                        </th>
                    </tr>
                   
                </table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="submit_form">Save</button>
            </div>
          </div>
        </div>
      </div>




@endsection
@push('scripts')
<script>
$(document).on('click','.open_modal',function(){
   let t= $(this).data('total');
   let order_id= $(this).data('order_id');
   $('#total_amount').html(t)
   $('#order_id').val(order_id)

})



  let isverify=0;
        $(document).on('click', '#submit_form', function() {

            ex = $('#exchange_amount').val()
            paid = $('#paid_amount').val()
            discount = $('#discount_amount').val()
            discount_type = $('#discount_type').val()
            order_id = $('#order_id').val()
            payment_type = $('#payment_type').val()

            if (isverify==0) {
               
            if (parseInt(discount)!=0) {
                $('.security_code_wrapper').removeClass('d-none')
                $('.security_code_wrapper').addClass('d-inline-block')

                return false;
            }
        }

            if (paid != '') {
                $.ajax({
                    type: 'get',
                    url: "{{ url('admin/order/edit/') }}/" + ex + '/' + paid + '/' + discount+'/'+order_id+'/'+discount_type+'/'+payment_type,
                    success: function(res) {
                        if (res==1) {
                        toastr.success('Bill paid');
                            
                        }else{
                        toastr.error('Failed to update bill');

                        }
                        location.reload(true)
                    }
                })
            }
        })



        $('#security_code_btn').click(function(){
    let security_code=$('#security_code').val();
    if (security_code.trim().length<=0) {
        alert('Enter Discount Code')
        return false;
    }
    $.ajax({
                type: 'get',
                url: "{{ url('admin/verify_security/') }}/" + security_code,
                success: function(data) {
                    if (data==1) {
                    isverify=1;
                    $('.security_code_wrapper').removeClass('d-inline-block')
                     $('.security_code_wrapper').addClass('d-none')
                        toastr.success('Security code match');
                        
                    }else{
                        toastr.error('Security code doesn\'t match');
                    }
                }
            })
})


    
$('#paid_amount').keyup(function(){
 amount();

    })
    $('#discount_amount').keyup(function(){
 amount();

    })

    function amount(){
        $('#exchange_amount').val('')
    $paid=$('#paid_amount').val();
    $clean=$paid.trim();
    if ($clean.length>=1) {
    $total=parseInt($('#total_amount').html());
    $discount=$('#discount_amount').val();

    if($discount.trim()==''){
          $discount=0;
    }
    $discount_type=$('#discount_type').val();
    $damount=($total*$discount)/100;

    if ($discount_type==1) {
        $damount=parseInt($discount);
    }
    $refund=$paid-$total+$damount;

    $('#exchange_amount').val($refund)
}
    }

</script>
@endpush