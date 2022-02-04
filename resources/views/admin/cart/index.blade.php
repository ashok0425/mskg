
<div class="table-responsive">

<table width="100%" class="table table-striped table-bordered table-hover text-center" id="categorytable">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th class="d_none">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ;
    $total=0;
    ?>

    @foreach($carts as $cart)
    @php
        $total+=$cart->price*$cart->qty;
    @endphp
        <tr>
            <td>{{$cart->name}} </td>
            <td>{{$cart->price}} </td>

            <td> {{$cart->qty}}</td>
            <td>{{$cart->price*$cart->qty}} </td>

            <td class="d_none">
                    <a  class="btn btn-danger delete-carts "   data-id="{{$cart->id}}"><i class="fas fa-trash text-white" ></i></a>
                </td>
        </tr>

    @endforeach

    </tbody>
    @if (count($carts)>0)
        
    <tfoot>
        <tr>
            <th colspan="1">Total</th>
            <th colspan="2">Rs {{ $total }}</th>
            <th colspan="2"><label><input type="checkbox" id="check_discount"> Have Discount ?</label>
            <p class="d-none" id="discount"> <input type="number" id="discount_amount"  placeholder="Discount Amount (Only in case if discount is available) " autocomplete="off" class=" form-control"  name="discount" value="0"></p>
            </th>

<input type="hidden" value="{{ $total }}" id="total">
        </tr>

        

        <tr>
            <th>Amount Received</th>
            <th colspan="2"><input type="number" id="paid_amount" autocomplete="off" class="w-75 form-control" min="1"></th>
            <th>Amount Change</th>
            <th><input type="text" id="exchange_amount" autocomplete="off" readonly class="w-75 form-control" min="1"></th>
        </tr>

        <tr>
            <td colspan="5">
                <button class="btn btn-primary form-control" type="submit" id="submit_form"><i class="fa fa-arrow-right " ></i> Make Bill </button>
            </td>
        </tr>
    </tfoot>
    @endif

</table>
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
    $damount=($total*$discount)/100;
    $refund=$paid-$total+$damount;

    $('#exchange_amount').val($refund)
}
    }

    $('#check_discount').click(function(){
        if ($(this).prop('checked')) {
            $('#discount').removeClass('d-none')
        $('#discount').addClass('d-block')
        }else{
            $('#discount').addClass('d-none')
        $('#discount').removeClass('d-block')
        }
     

    })



    $('#check_discount').click(function(){
        if ($(this).prop('checked')) {
            $('#discount').removeClass('d-none')
        $('#discount').addClass('d-block')
        }else{
            $('#discount').addClass('d-none')
        $('#discount').removeClass('d-block')
        }
     

    })

  
</script>