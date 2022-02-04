
@push('style')
    {{-- searchable select  --}}
    <style>
        th,td{
            font-size: 14px!important;
        }
    </style>
@endpush

@extends('admin.layout.master')

<!-- page content -->
@section('content')
<div class="response"></div>

<div class="row">
    <div class="col-md-6">
        <div class="card">

            <x-errormsg/>
               <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary pt-2">Make Quick Sale </h6>

               </div>
            <div class="card-body">
                <form id="btnSave" action="" method="GET">
                    {{ csrf_field() }}
                
                        <div class="table-responsive">
                     <table class="table table-striped text-center" id="mycarttable">
                         <thead>
                             <tr>
                                <th>Image</th>
                                 <th>Name</th>
                                 <th>Price</th>
                                 <th>Qty</th>

                                 <th>Action</th>
             
                             </tr>
                         </thead>
                         <tbody>
                             
                             @foreach ($menus as $menu)
                            
                             <tr>
                                 <td><img src="{{ asset($menu->image) }}" alt="" width="60"></td>
                                 <td>{{ $menu->name }}</td>
                                 <td>{{ $menu->price }}</td>
                                 <td><input type="number" name="qty" class="form-control mx-auto text-center w-75"  value="1" id="qty{{ $menu->id }}"></td>
             
                                 <td>
                                    <a href="#"  class="add_to_cart btn btn-primary btn-circle" data-menu="{{ $menu->id }}"><i class="fas fa-plus"></i></a>
                                   </a>
                                 </td>
             
                             </tr>
                            

                             @endforeach
             
                         </tbody>
                     </table>
                 </div>

                </form>
            </div>
        </div>
</div>

    <div class="col-md-6">
        <div class="card">

            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary pt-2"> Quick Bill </h6>

               </div>
                <div class="clearfix"></div>
            <div class="card-body">

                <div id="cartlist">

                </div>
                

        </div>
    </div>
</div>
</div>
    <!-- /page content -->


@endsection
@push('scripts')

    <script >
// fastdropdown

        $(document).ready(function () {
            $('.add_to_cart').on('click', function (e) {
                // $('.response').html();
                e.preventDefault()
                var id = $(this).data('menu');
                var qty = $('#qty'+id).val();
                var path = "{{url('admin/add_to_cart')}}/"+id+'/'+qty;
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {   
                        readsales();
                     if (data.alert==1) {
                        var m = "<div class='alert alert-success py-2 px-5'>" + data.message + "</div>";
                    $('.response').html(m);
                     }else{
                        var m = "<div class='alert alert-danger py-2 px-5'>" + data.message + "</div>";
                    $('.response').html(m);
                     }
                        

                    }
                });

            });

        });



        readsales();

function readsales() {
    $('.response').html();

    $.ajax({
        type: 'get',
        url: "{{url('admin/carts')}}",
        dataType: 'html',
        success: function (data) {
            $('#cartlist').html(data);
        }
    })
}


$(document).on('click','.delete-carts',function() {
            let id=$(this).data('id');
            
            $.ajax({
                type: 'get',
                url: "{{url('admin/cart/delete/')}}/"+id,
                dataType: 'json',
                success: function (data) {
                    readsales();
                    var m = "<div class='alert alert-success py-2 px-5'>" + data + "</div>";
                    $('.response').html(m);

                }
            })
        })
    </script>
   
       

    
<script>
$(document).on('click','#submit_form',function() {

       ex= $('#exchange_amount').val()
       paid= $('#paid_amount').val()
       discount= $('#discount_amount').val()

       if ($paid!='') {
        $.ajax({
                type: 'get',
                url: "{{url('admin/order/add/')}}/"+ex+'/'+paid+'/'+discount,
                dataType: 'html',
                success: function (data) {
                    readsales();
                    // if (data.alert==1) {
                    //     var m = "<div class='alert alert-success py-2 px-5'>" + data.message + "</div>";
                    // $('.response').html(m);
                    //  }else{
                    //     var m = "<div class='alert alert-danger py-2 px-5'>" + data.message + "</div>";
                    // $('.response').html(m);
                    //  }

                    myWindow=window;
            myWindow.document.write(data);
            myWindow.focus();
            myWindow.print(); 
            myWindow.close(); //missing code
            location.reload()
                }
            })
       }
       


    })
</script>

       

@endpush
