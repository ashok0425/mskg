@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Opening Balance Data</h6>

  
       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Date</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($opening_balances as $opening_balance)
                    
                <tr>
                    <td>{{ $opening_balance->amount }}</td>
                    <td>{{ Carbon\Carbon::parse($opening_balance->created_at)->format('d-m-Y') }}</td>



                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
       </div>
   </div>
@endsection