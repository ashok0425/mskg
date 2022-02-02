@extends('kitchen.layout.master')

@section('content')
   <div class="card shadow">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Recent Order</h6>

       </div>
      
       <div id="data">

       </div>
   </div>
@endsection


@push('scripts')
    
<script>
    setInterval(() => {
        load_order();  
    }, 100);
 
  function load_order(){
      $.ajax({
          url:'{{ url('load-order') }}',
          type:'GET',
          dataType:'html',
          success:function(data){
               $('#data').html(data)
          }
      })
  }
</script>

@endpush