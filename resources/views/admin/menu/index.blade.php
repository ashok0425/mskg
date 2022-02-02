@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Menu Data</h6>

        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary pull-right float-right">
            <i class="fas fa-plus pr-2"></i>Create Menu</a>
       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td><img src="{{ asset($menu->image) }}" alt="" width="120"></td>
                    <td>{{ $menu->price }}</td>

                    <td><a href="{{ route('admin.menus.edit',$menu) }}"  class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin.menus.delete',['id'=>$menu->id]) }}"  class="delete_row btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
       </div>
   </div>
@endsection