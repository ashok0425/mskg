     <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Transcation Id</th>
                    <th>Name</th>
                    <th>Payment Mode</th>
                    <th>Amount </th>            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($payment as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\carbon::parse($item->date)->format('d F Y')}}<br>{{carbon\carbon::parse($item->time)->format('i -s -H')}}</td>
                        <td>{{$item->payment_id}}</td>
                        <td>{{$item->name}}</td>

                        <td>{{$item->payment_mode}}</td>
                        <td>{{$item->amount}}</td>
                     
                    </tr>
                @endforeach
            </tbody>
              </table>
   

