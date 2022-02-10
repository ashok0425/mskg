@extends('kitchen.layout.master')

@section('content')
   {{-- <div class="card  bg-gray">
       <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Recent Order</h6>

       </div>
    </div> --}}

       <div id="data">

       </div>
@endsection


@push('scripts')
    
<script>
        load_order();  

    setInterval(() => {
        load_order();  
    }, 3000);
 
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