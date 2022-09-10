<style>
   #cartlist  table, #cartlist  tr{
        border:1px solid gray;
        border-collapse: collapse;
    }
    tr td,tr th{
        padding: 0 0.2rem;
    }
</style>

<div class="row" >
      
    <?php $i=1 ;
    $total=0;
    ?>

    @foreach($rooms as $room)
    
    @if (count($room->cart)>0)

    <div class="col-md-6">
 
<div class="card shadow-sm">
<table  id="categorytable">
    <tr>
        <th colspan="2">{{$room->name}} </th>
        <th colspan="2"><a href="#" class="btn btn-sm btn-danger" id="only_print" data-room_id="{{$room->id}}"><i class="fa fa-print"></i></a> </th>

    </tr>
    <tr>
        <th> Item</th>
        <th> Price</th>
        <th> qty</th>


    </tr>
    @foreach ($room->cart as $cart)
        
    @php
        $total+=(int)$cart->menu->price*(int)$cart->qty;
    @endphp
       
        <tr>
            <td>
                {{$cart->menu->name}} 
                <a href="" class="text-danger delete-carts "   data-id="{{$cart->id}}"><i class="fa fa-trash"></i></a>
            </td>
            <td>{{$cart->menu->price}} </td>
            <td> {{$cart->qty}}</td>

        </tr>

    @endforeach
            

    <tr>
        <th >Total</th>
        <th >Rs {{ $total }}</th>
    </tr>

    <tr>
        <td colspan="3">

            <button class="btn btn-primary w-100 py-0 my-1 make_bill" data-total="{{$total}}" data-bill_table={{$room->id}} type="submit"   data-toggle="modal" data-target="#exampleModal"><i class="fa fa-arrow-right " ></i> Make Bill </button>
        </td>
    </tr>
</table>
</div>
</div>
@endif

@endforeach

</div>
<script>

    
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
    $total=$('#total').val();
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

  
  $(document).on('click','.make_bill',function(){
    $('#total').val($(this).data('total'))
    $('#total_amount').html($(this).data('total'))

    $('#bill_table').val($(this).data('bill_table'))

  })
</script>