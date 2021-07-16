
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Id</th>

                    <th>Name</th>
                    <th>Actual Price</th>

                    <th>Price</th>
                    <th>Qty</th>
                    <th>Coupon</th>
                    <th>Subtotal</th>
                    <th>Status</th>
                    <th>Date</th>


            
                </tr>
            </thead>
            <tbody >
                
                @foreach ($order as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tracking_code}}</td>
                     
                        <td>{{$item->name}}
                                <p>color:{{ $item->color }}</p>
                            
                                               <p >Size: {{$item->size}}</p>
                           
                        </td>
                        <td>{{$item->actual_price}}</td>

                        <td>{{$item->price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>@if ($item->coupon!='')
                            <p>
                                {{$item->coupon}}
                            </p>
                            <p>
                                {{$item->coupon_value}}%
                            </p>
                            @else 
                            No coupon
                        @endif
                    
                    </td>

                        <td>{{$item->price *$item->qty }}</td>

                        <td>
                            @if ($item->status==0)
                            <span >
                                Pending                  
                            </span>
                            @endif
                                    
                            @if ($item->status==1)
                            <span >
                                        Proccessing            
                            </span>
                            @endif
                            @if ($item->status==2)
                            <span >
                                Shipping                     
                            </span>
                            @endif @if ($item->status==3)
                            <span >
                                Delivery                   
                            </span>
                            @endif @if ($item->status==4)
                            <span >
                                Cancel                    
                            </span>
                            @endif
                        </td>
                        <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
                    </tr>
                @endforeach
            </tbody>
              </table>