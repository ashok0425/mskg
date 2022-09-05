@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Expenses Data</h6>

        @if (isset($today_opening))
        <p><strong>
            Today Opening : {{$today_opening}}</strong></p>
        @endif
        
        <a href="{{ route('admin.expenses.create') }}" class="btn btn-primary pull-right float-right">
            <i class="fas fa-plus pr-2"></i>Add Expenses</a>
       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>

                    <th>Date</th>
                    <th>Remark</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total=0;
                @endphp
                @foreach ($expenses as $expense)
                    @php
                        $total=$total+$expense->amount;
                    @endphp
                <tr>
                    <td>{{ $expense->name }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ Carbon\Carbon::parse($expense->created_at)->format('d/m/y') }}</td>


                    <td>{{ $expense->remark }}</td>
                    <td><a href="{{ route('admin.expenses.edit',$expense) }}"  class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                        {{-- <a href="{{ route('admin.menus.delete',['id'=>$menu->id]) }}"  class="delete_row btn btn-danger btn-circle"><i class="fas fa-trash"></i></a> --}}
                    </td>

                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td>{{$total}}</td>
 <td></td>
 <td></td>

                </tr>
            </tfoot>
        </table>
    </div>
       </div>
   </div>
@endsection