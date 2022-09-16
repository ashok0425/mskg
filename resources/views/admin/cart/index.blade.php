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
      
   

    @foreach($rooms as $room)
    
    @if (count($room->cart)>0)
    <?php 
    $total=0;
    ?>
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

            <button class="btn btn-primary w-100 py-0 my-1 make_bill"  data-bill_table={{$room->id}} id="submit_form"><i class="fa fa-arrow-right " ></i> Make Bill </button>
        </td>
    </tr>
</table>
</div>
</div>
@endif

@endforeach

</div>
<script>

  
  $(document).on('click','.make_bill',function(){
    $('#total').val($(this).data('total'))
    $('#total_amount').html($(this).data('total'))

    $('#bill_table').val($(this).data('bill_table'))

  })
</script>