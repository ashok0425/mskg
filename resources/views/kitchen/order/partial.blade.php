<div class="container">
<div class="row">
     @foreach($rooms as $room)
    
    @if (count($room->cart)>0)

    <div class="col-md-3">
 
<div class="card shadow-sm px-1">
<table  id="categorytable">
    <tr class="border-bottom">
        <th colspan="2">{{$room->name}} </th>
    </tr>
    <tr>
        <th> Item</th>
        <th> Price</th>
        <th> qty</th>


    </tr>
    @foreach ($room->cart as $cart)
 
       
        <tr>
            <td>
                {{$cart->menu->name}} 
            </td>
            <td>{{$cart->menu->price}} </td>
            <td> {{$cart->qty}}</td>

        </tr>

    @endforeach
    
</table>
</div>
</div>
@endif

@endforeach

</div>
</div>
