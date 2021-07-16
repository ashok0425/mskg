@extends('admin.master')
@section('main-content')
@php
    define('PAGE','vmanagement')
@endphp

<div class="container">
    <div class="card py-3 px-4">
        {{-- <div class="d-flex justify-content-between"> --}}
            <h3>Pending Coupon List</h3>
            {{-- <a href="{{route('admin.banner.create')}}" class="btn btn-info btn-lg" ></a> --}}
        {{-- </div> --}}
        <br>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Coupon</th>
                    <th>Discount %</th>
                    <th>Experide At</th>



                    <th>Status</th>
                    <th>Action</th>
            
                </tr>
            </thead>
            <tbody>
                
                @foreach ($coupon as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->uname}}   <a href="{{route('admin.vendor.edit',['id'=>$item->uid])}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->coupon}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{carbon\carbon::parse($item->expire_at)->format('d-F-Y')}}</td>
<td>
    @if ($item->Isapproved==1)
        <div class="badge bg-success">Approve</div>
        @elseif($item->Isapproved==2)
        <div class="badge bg-danger">Reject</div>
@else 
<div class="badge bg-danger">Pending</div>

    @endif
</td>

                        <td>
                            <button type="button" class="btn btn-primary app" data-toggle="modal" data-target="#exampleModal" id="" data-id="{{$item->id}}">
                                Approved/Reject
                              </button> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <form action=" {{route('admin.vendor.coupon.edit')}}  " method="POST">
            @csrf
      <div class="modal-content">
      
        
        <div class="modal-body">
            <p>Accept/Reject Coupon</p>
         
            <input type="hidden" name="cid" class="cid">
        <select name="isapproved" id="isapproved" class="form-control">
<option value="0">Pending</option>
<option value="1">Approve</option>
<option value="2">Reject</option>

        </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>

      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script>
   $('.app').click(function(){
    $id=$(this).data('id')
       $('.cid').val($id)
   })
</script>

@endpush