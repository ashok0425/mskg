
<div class="row">
    @foreach ($orders as $order)
@php
    $order_detail=DB::table('order_details')->join('menus','menus.id','order_details.menu_id')->where('order_details.status',0)->whereDate('order_details.created_at',today())->select('order_details.*','menus.name','menus.image')->where('order_details.order_id',$order->id)->get();
@endphp

    <div class="col-md-3 col-sm-3">
<div class="card shadow">
    <div class="card-header d-flex justify-content-between">
<strong>BILL NO : {{ $order->order_id }}</strong>
    <div class="d-flex  align-items-center">
        
      
           <div
            class="size-52 mx-1 custom-bg-orange d-flex align-items-center justify-content-center custom-fs-20 custom-text-white" >
        <span>&nbsp;</span>
        <span id="min{{ $order->id }}" class="btn btn-success btn-sm"></span>
            </div>

            <div
            class="size-52 mx-1 custom-bg-orange d-flex align-items-center justify-content-center custom-fs-20 custom-text-white" >
            <span> &nbsp;</span>
            <span id="sec{{ $order->id }}" class="btn btn-danger btn-sm"></span>

            </div>
    </div>
</div>

 <table class="table">
     <thead>
         <tr>
             <th>Name</th>
             <th>Qty</th>

         </tr>
     </thead>
     <tbody>

         @foreach ($order_detail as $item)
    
           <tr>
            <td>{{ $item->name }}</</td>

            <td>{{ $item->qty }}</</td>

        </tr>
   
     
        @endforeach
    
     </tbody>
     
 </table>

</div>







<script>


// Update the count down every 1 second
var x = setInterval(function() {

    // Set the date we're counting down to
    var countDownDate = new Date("{{ carbon\carbon::parse($order->created_at)->format('M d Y H:i:s')}}").getTime();
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance =  now - countDownDate;

  // Time calculations for days, hours, minutes and seconds
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"

  document.getElementById("min"+{{$order->id}}).innerHTML =minutes
  document.getElementById("sec"+{{ $order->id }}).innerHTML =seconds

 
}, 1000);



</script>


</div>



@endforeach

</div>
</div>
