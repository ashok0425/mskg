@push('style')
    {{-- searchable select --}}
    <style>
        th,
        td {
            font-size: 14px !important;
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

                <x-errormsg />
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
                                        <th>Table/Room</th>


                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td><img src="{{ asset($menu->image) }}" alt="" width="40" height="40"></td>
                                            <td class="w-25">{{ $menu->name }}</td>
                                            <td>{{ $menu->price }}</td>
                                            <td>
                                                @php
                                                    $rooms = DB::table('rooms')->get();
                                                @endphp
                                                <select name="room_type" id="" class="form-control w-100 room_id{{ $menu->id }}">
                                                    @foreach ($rooms as $room)
                                                <option value="{{$room->id}}">
                                                    {{$room->name}}
                                                </option>

                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input type="number" name="qty"
                                                    class="form-control mx-auto text-center w-100" value="1"
                                                    id="qty{{ $menu->id }}">

                                                <a href="#" class="add_to_cart btn btn-primary btn-circle"
                                                    data-menu="{{ $menu->id }}"><i class="fas fa-plus"></i></a>
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
            </div>
{{-- place for cart list item  --}}
                    <div id="cartlist">

                    </div>


                </div>
            </div>
        
    <!-- /page content -->





    {{-- modal for bill payment --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
     
                <input type="hidden" name="" id="total">
                <input type="hidden" name="" id="bill_table">

                <table class="w-100">

                    <tr>
                        <th>Total
                        </th>
                        <th> Rs<span id="total_amount"> </span></th>
                    </tr>
                    <tr>
                        <th> Have Discount ?
                        </th>
                        <th> <input type="number" id="discount_amount"  placeholder="Discount in % (only if any)" autocomplete="off" class=" form-control"  name="discount" ></th>
                    </tr>
            
                    
            
                    <tr style="margin-top:1rem!important;">
                        <th>Amount Received</th>
                        <th><input type="number" id="paid_amount" autocomplete="off" class="w-100 form-control" min="1"></th>
                    </tr>
                    <tr style="margin-top:1rem!important;">
            
                        <th>Amount Change</th>
                        <th ><input type="text" id="exchange_amount" autocomplete="off" readonly class="w-100 form-control" min="1"></th>
                    </tr>
            
                   
                </table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="submit_form">Save</button>
            </div>
          </div>
        </div>
      </div>

@endsection
@push('scripts')
  
    <script>
       
        $(document).ready(function() {
            $(document).on('click', '.add_to_cart', function(e) {
                // $('.response').html();
                e.preventDefault()
                var id = $(this).data('menu');
                var qty = $('#qty' + id).val();
                var room_id = $('.room_id' + id).val();
                var path = "{{ url('admin/add_to_cart') }}/" + id + '/' + qty+'/'+room_id;
                console.log(path)
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        readsales();
                        if (data.alert == 1) {
                            var m = "<div class='alert alert-success py-2 px-5'>" + data
                                .message + "</div>";
                            $('.response').html(m);
                        } else {
                            var m = "<div class='alert alert-danger py-2 px-5'>" + data
                                .message + "</div>";
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
                url: "{{ url('admin/carts') }}",
                dataType: 'html',
                success: function(data) {
                    $('#cartlist').html(data);
                }
            })
        }


        $(document).on('click', '.delete-carts', function(e) {
            e.preventDefault()
            let id = $(this).data('id');

            $.ajax({
                type: 'get',
                url: "{{ url('admin/cart/delete/') }}/" + id,
                dataType: 'json',
                success: function(data) {
                    readsales();
                    var m = "<div class='alert alert-success py-2 px-5'>" + data + "</div>";
                    $('.response').html(m);

                }
            })
        })
    </script>




    <script>
        $(document).on('click', '#submit_form', function() {

            ex = $('#exchange_amount').val()
            paid = $('#paid_amount').val()
            discount = $('#discount_amount').val()
            room_id = $('#bill_table').val()


            if ($paid != '') {
                $.ajax({
                    type: 'get',
                    url: "{{ url('admin/order/add/') }}/" + ex + '/' + paid + '/' + discount+'/'+room_id,
                    dataType: 'html',
                    success: function(data) {
                        readsales();
                        myWindow = window;
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
