@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Menu Data</h6>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary pull-right float-right">
            <i class="fas fa-plus pr-2"></i>Create Categories</a>
       </div>
      
       <div class="card-body">
           <div class="table-responsive">
        <table class="table table-striped text-center" id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ asset($category->image) }}" alt="" width="120"></td>

                    <td><a href="{{ route('admin.categories.edit',$category) }}"  class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                       
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
       </div>
   </div>
@endsection