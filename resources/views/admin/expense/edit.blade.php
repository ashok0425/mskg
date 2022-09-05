@extends('admin.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Create New Expense </h6>
       </div>
      <x-errormsg/>
       <div class="card-body">
       <form action="{{ route('admin.expenses.update',$expense) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
           <div class="row">
               <div class="col-md-6 mt-3">
                   <label for="name">Name</label>
                   <input type="text" name="name" id="" class="form-control" placeholder="Enter menu name" value="{{ $expense->name }}" required>
               </div>
               <div class="col-md-6 mt-3">
                <label for="name">Amount</label>
                <input type="text" name="amount" id="" class="form-control" placeholder="Enter  Amount" value="{{ $expense->amount }}" required>
            </div>
            
               
               <div class="col-md-12 mt-3">
                <label for="name">Remark</label>
                <input type="text" name="remark" id="" class="form-control" placeholder="Write remark" value="{{ $expense->remark }}" required>
            </div>
           
            <div class="col-md-6 mt-3">
                <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Save</span>
                </button>
            </div>
           </div>
       </form>
       </div>
   </div>
@endsection