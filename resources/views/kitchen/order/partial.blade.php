<div class="card-body">
    <div class="table-responsive">
 <table class="table table-striped text-center" id="myTable">
     <thead>
         <tr>
             <th>Image</th>
             <th>Name</th>
             <th>Price</th>
             <th>qty</th>
             <th>Total</th>
             <th>Status</th>

         </tr>
     </thead>
     <tbody>
       
         @foreach ($order_detail as $order)
         
         <tr>
             <td><img src="{{ asset($order->image) }}" alt="" width="100"></td>
             <td>{{ $order->name }}</</td>
             <td>{{ $order->price }}</td>
             <td>{{ $order->qty }}</td>
             <td>{{ $order->price*$order->qty }}</td>
             <td>@if ($order->status==0)
                 <p class="py-0 my-0"><span class="badge bg-danger text-light">Pending</span></p> 

                <a href="{{ route('orders.status',['id'=>$order->id]) }}"><span class="badge bg-success text-light">Click if served</span></a> 

                 @else   
                 <a><span class="badge bg-success text-light">Served</span></a> 

             @endif</td>


         </tr>
         @endforeach
    
     </tbody>
 </table>
</div>
</div>