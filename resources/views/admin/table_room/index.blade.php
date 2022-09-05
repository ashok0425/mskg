@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Room/Table Data</h6>

        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary pull-right float-right">
            <i class="fas fa-plus pr-2"></i>Create New</a>
       </div>
      
       <div class="card-body">
        <div class="table-responsive">
     <table class="table table-striped text-center" id="myTable">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Type</th>
                 <th>Status</th>
                 <th>Action</th>

             </tr>
         </thead>
         <tbody>
             @foreach ($rooms as $room)
                 
             <tr>
                 <td>{{ $room->name }}</td>
                 <td>{{ $room->type==0?'Table':'Room' }}</td>
                 <td>@if ($room->Isbooked==0)
                    <span class="badge bg-primary text-white">Not Booked</span>
                    @else 
                    <span class="badge bg-danger text-white">Booked</span>
                 @endif </td>


                 <td><a href="{{ route('admin.rooms.edit',$room) }}"  class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                     <a href="{{ route('admin.rooms.delete',['id'=>$room->id]) }}"  class="delete_row btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                 </td>

             </tr>
             @endforeach

         </tbody>
     </table>
 </div>
   </div>
@endsection