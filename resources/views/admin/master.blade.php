<!DOCTYPE html>
<html lang="en">
@php
	$setting=DB::table('websites')->first();
@endphp
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{ $setting->descr }}">
	<meta name="author" content="{{ $setting->url }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="keywords" content="{{ $setting->keyword }}">

<link rel="icon" href="{{asset("fev.png")}}" type="image/icon type">

	<title>{{ $setting->title }}</title>



{{-- fontawsome  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
{{-- custom css --}}
	<link href="{{asset('admin/css/app.css')}}" rel="stylesheet">
	{{-- summernote css  --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

	{{-- datatables  --}}
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    {{-- toastr  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<style>


.file-upload-wrapper {
	position: relative;
	width: 100%;
	height: 40px;
    border: 1px solid #17e67e;

}

.file-upload-wrapper:after {
	content: attr(data-text);
	font-size: 18px;
	position: absolute;
	top: 0;
	left: 0;
	background: #fff;
	padding: 0px 15px;
	display: block;
	width: calc(100% - 40px);
	pointer-events: none;
	z-index: 20;
	height: 10px;
	line-height: 40px;
	color: #999;
	border-radius: 5px 10px 10px 5px;
	font-weight: 300;
}

.file-upload-wrapper:before {
	content: 'Choose file';
	position: absolute;
	top: 0;
	right: 0;
	display: inline-block;
	height: 40px;
	background: #4daf7c;
	color: #fff;
	font-weight: 700;
	z-index: 25;
	font-size: 16px;
	line-height: 40px;
	padding: 0 15px;
	text-transform: uppercase;
	pointer-events: none;
	border-radius: 0 5px 5px 0;
}

.file-upload-wrapper:hover:before {
	background: #17e67e;
}

.file-upload-wrapper input {
	opacity: 0;
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 99;
	height: 20px;
	margin: 0;
	padding: 0;
	display: block;
	cursor: pointer;
	width: 100%;
}
table,td,tr,th{
	border:  .5px solid rgb(209, 208, 208)!important;
	border-collapse: collapse;
}
.card{
	border-top: 5px solid rgb(5, 24, 199);
}
#myTable_length{
	margin-bottom: 1rem!important;
}
.dataTables_wrapper select{
	border: 1px solid #aaa;
    border-radius: 3px;
    padding: .4rem 3rem!important;
}
h3{
	background: #000;
	padding: .3rem 1rem;
	font-weight: bold;
	color: #ffffff;
}
.panel-heading.note-toolbar{
background:#60c3d3;
}
.card{
	padding: 0 1rem;
}
button{
    background:#60c3d3;
    padding:.3rem 1rem;
    color:#fff!important;
}
</style>
<body>
	<div class="wrapper">
        {{-- include sidebar --}}
@include('admin.layout.sidebar')

		<div class="main">
        {{-- include header --}}

@include('admin.layout.header')

			<main class="content">
                 {{-- include breadcrum --}}
       {{--Dyanmic content --}}
@include('admin.layout.breadcrum')
<x-errormsg />
    @yield('main-content')
			
			</main>

		
		</div>
	</div>
{{-- bootstrap  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{-- custom js --}}
<script src="{{asset('admin/js/app.js')}}"></script>

{{-- toastr  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- datatables  --}}
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>



{{-- sweet alert  --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- !-- include summernote js --> --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	{{-- fetching data category,subcategory --}}
	@stack('scripts');
<script>
$(document).ready(function(){
$(document).on('click','.data',function(){
		
		let datas=$(this).attr('data-text');
		let id=$(this).val();
if(datas=='subcategory'){
let option=	$('.category').val();
	loadData(datas,id,option)	

}else{
	loadData(datas,id)	

}
	})
})
	
	function loadData(table,id,option){
$.ajax({
	
	url:'{{url('admin/loaddata')}}/'+table+'/'+id+'/'+option,
	DataType:'json',
	type:'GET',
	success:function($data){
		console.log($data)
		if(table=='category'){
				$('.subcategory').html();
				$('.model').html();

			$('.subcategory').html($data);
		}
		if(table=='subcategory'){
				$('.model').html();
			$('.model').html($data);
		}
	}
})
	}

</script>

<script>
// {{-- inializing summernote  --}}
$(document).ready(function() {
	$('#summernote').summernote();
	$('#summernote1').summernote();
	$('#summernote2').summernote();
	$('#summernote3').summernote();
	$('#summernote4').summernote();



  });
//   {{-- toastr  --}}

    @if(Session::has('messege'))//toatser
      var type="{{Session::get('alert-type','info')}}"
      switch(type){
          case 'info':
               toastr.info("{{ Session::get('messege') }}");
               break;
          case 'success':
              toastr.success("{{ Session::get('messege') }}");
              break;
          case 'warning':
             toastr.warning("{{ Session::get('messege') }}");
              break;
          case 'error':
              toastr.error("{{ Session::get('messege') }}");
              break;
      }
    @endif
 </script>
	

    {{-- file upload  --}}
    <script>
        $("form").on("change", ".file-upload-field", function(){ 
    $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/, '') );
});
    </script>

	{{-- datatables iniziing --}}
	<script >
		$(document).ready( function () {
			$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
} );

	</script>

<script>
 $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to delete?",
             text: "Once Delete, This will be Permanently Delete!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe Data!");
             }
           });
       });
</script>

<script >
	$('#status').change(function(){
		let $val=$(this).val();
		let $hid=$(this).data('id');

		
		$.ajax({
			url:'{{ url('admin/order/status') }}/'+$val+'/'+$hid,
			type:'GET',
			DataType:'json',
			success:function($data){
				location.reload(true)
				console.log($data);
			}
		})
	})
</script>


<script >
	$('.price').click(function(){
		$('.comission_price').val('');
		let $val=$(this).val();		
loadprice($val)
		
	})
	$('.price').keyup(function(){
		$('.comission_price').val('');
		let $val=$(this).val();		
loadprice($val)
		
	})
	function loadprice($val){
		$.ajax({
			url:'{{ url('admin/comission') }}/'+$val,
			type:'GET',
			DataType:'json',
			success:function($data){
				console.log($data);
				$('.comission_price').val('');

				$('.comission_price').val($data);
			}
		})
	}
</script>
</body>

</html>