@php
	$setting=DB::table('websites')->first();
	
@endphp

@section('title')
{{ $setting->title }}
@endsection
@section('descr')
{{ $setting->descr }}
@endsection
@section('keyword')
{{ $setting->title }}
@endsection
@section('title')
{{ $setting->title }}
@endsection
@section('img')
{{ asset($setting->image) }}
@endsection
@section('url')
{{Request::url()}}
@endsection

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta property="fb:app_id" content="457897745217012" />
<meta property="og:url"                content="@yield('url')" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="@yield('title')" />
<meta property="og:description"        content="@yield('descr')" />
<meta property="og:image"              content="@yield('img')" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="author" content="{{$seo->meta_author}}"> --}}
    <meta name="keyword" content="@yield('keyword')">
    <meta name="description" content="@yield('descr')">

    <link rel="icon" href="{{asset("fev.png")}}" type="image/icon type">

        <title>@yield('title')</title>

{{-- OwlCarousel2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<link href="{{ asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="{{ asset('frontend/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">
{{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    {{-- jquery ui  --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- custom style -->
<link href="{{ asset('frontend/css/ui.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet" type="text/css" />
<style>
.border_bg{
    color:#60c3d3!important;
}
	.rstar{
		color: orangered!important;
	}

	.dstar{
		color: gray!important;
	}
	.heart .fas{
		color:var(--info);
		font-size: 1.5rem!important;
	}
	.heart .far{
		color:#000;
		font-size: 1.5rem!important;

	}
	
	</style>
<style>
	.heart{
		text-align: right;
		
		padding-top: .6rem;
		padding-bottom: .6rem;

		padding-right: 1rem;

	}
	
	.search_result{
		position:absolute;
		z-index: 99;
		background: gray;
		top: 50px;
		width: 90%;
	}
	#price{
		font-size: .8rem;
	}

	.loading{
	  background: rgba(0,0,0,.4);
	  width: 100%;
	  height: 100vh;
	  position: fixed;
	  top: 0;
	  left: 0;
	  z-index: 999999;
	  display: none;
	}
.loader {
 border: 16px solid #f3f3f3; /* Light grey */
 border-top: 16px solid rgb(3, 252, 252); /* Blue */
 border-radius: 50%;
 width: 70px;
 height: 70px;
 animation: spin 2s linear infinite;
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);

z-index: 9999;

}

@keyframes spin {
 0% { transform: rotate(0deg); }
 100% { transform: rotate(360deg); }
}
.m{
	display: none;
	margin-top:9rem;
}
   </style>
</head>
<body>
	<div class="loading">

		<div class="loader"></div>
	  </div>
<b class="screen-overlay"></b>

<header class="section-header">
    {{-- top header  --}}
@include('frontend.template.topheader')


    {{-- navbar  --}}

    @include('frontend.template.header')


</header> <!-- section-header.// -->
<div class="m"></div>
@yield('header')
<div class="container-fluid">
 
@yield('content')
<!-- =============== SECTION DEAL // END =============== -->




</div>  


<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="section-subscribe padding-y-lg">
<div class="container">

<p class="pb-2 text-center text-white">Send me exclusive offers, unique gift ideas, and personalized DIY tips!
</p>

<div class="row justify-content-md-center">
	<div class="col-lg-5 col-md-6">
<form class="form-row" action="{{ route('subscribe.store') }}" method="POST">
	@csrf
		<div class="col-md-8 col-7">
		<input class="form-control border-0" placeholder="Your Email" type="email" name="email">
		</div> <!-- col.// -->
		<div class="col-md-4 col-5">
		<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
	</div> <!-- col-md-6.// -->
</div>
	

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->


<!--Order Traking Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Oder Tracking</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
	 <form method="post" action="{{route('track.my.order')}}">
	  @csrf
	  <div class="modal-body">
		<label> Email Address</label>
		<input type="text" name="email" required class="form-control" >
		  <label> Tracking Code</label>
		  <input type="text" name="code" required class="form-control" >
	  </div>
  
	   <button class="btn btn-danger" type="submit">Track Now </button>
  
	 </form>
  
  
		</div>
  
	  </div>
	</div>
  </div>
  <input type="hidden" id="refreshed" value="no">




<!-- ========================= FOOTER ========================= -->
@include('frontend.template.footer')
<!-- ========================= FOOTER END // ========================= -->
<!-- jQuery -->
<script src="{{ asset('frontend/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
{{-- toastr  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  {{-- elvator zoom jquery --}}
  <script src='{{ asset('frontend/jquery.elevatezoom.js')}}'></script>
    {{-- jquery ui --}}
	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js "></script>
<!-- custom javascript -->
<script src="{{ asset('frontend/js/script.js')}}" type="text/javascript"></script>





{{-- product filter  --}}
@stack('scripts')

  <script>
	  $('.heart .far').mouseover(function(){
	
		  //$(this).removeClass('far')
		  $(this).addClass('border_bg')

	  })
	  $('.heart .far').mouseout(function(){
		 	   $(this).removeClass('border_bg');

	  })
  </script>
      {{-- custom input fielsd file  --}}
	  <script>
		  var perfEntries = performance.getEntriesByType("navigation");

if (perfEntries[0].type === "back_forward") {
    location.reload(true);
}
		// Add the following code if you want the name of the file appear on select
		$('#imageInput').on('change', function() {
$input = $(this);
if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
	   $('.image').css('display','none')
  $('.image-preview').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});
</script>


  {{-- toastr  --}}
  <script>
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


<script type="text/javascript">
	onload=function(){
	var e=document.getElementById("refreshed");
	if(e.value=="no")e.value="yes";
	else{e.value="no";location.reload();}
	}
</script>
{{-- search product  --}}
<script>
	$('#search').keyup(function(){
		$('.search_result').html('')

		let name=$(this).val();
		let category=$('#category').val();
		if(name!=''){

$.ajax({
	url:'{{ url('loadproduct') }}/'+name+'/'+category,
	type:'GET',
	dataType:'json',
	success:function(data){
		console.log(data);
		$('.search_result').html(data)
	}
})
}
		
	})
	$(document).on('click','.filters',function(e){
		e.preventDefault();
		let val=$(this).html();
		$('#search').val(val)
		$('.search_result').html('')

	})
</script>


	

	{{-- price increment and decrement  --}}
	<script>
		$('.incrementbtn').click(function(){
			let  qty= $(this).data('input');
			let   preval=parseInt($(document).find('#'+qty).val());
			let  id= $(this).data('id');
			let  price= $(this).data('price');
		   let element =$(this)
val=preval+1
		   $(document).find('#'+qty)[0].stepUp()
		   $.ajax({
			   url:'{{ url('cartqty') }}/'+val+'/'+id+'/'+price,
			   type:"GET",
			   dataType:'json',
			   success:function(data){
				$(document).find('#priced'+id).html(data['total']);
$('#carttotal').html(data['carttotal'])
$('#subtotal').html(data['carttotal'])
$('#grandtotal').html(data['grandtotal'])


				   console.log(data);
			   }
		   })
		})

		$('.decrementbtn').click(function(){
			let  qty= $(this).data('input');
			let   preval=parseInt($(document).find('#'+qty).val());
			let  id= $(this).data('id');
			let  price= $(this).data('price');

if(preval!==1){
val=preval-1

}
		   $(document).find('#'+qty)[0].stepDown()
		   $.ajax({
			   url:'{{ url('cartqty') }}/'+val+'/'+id+'/'+price,
			   type:"GET",
			   dataType:'json',
			   success:function(data){
				$(document).find('#priced'+id).html(data['total']);
$('#carttotal').html(data['carttotal'])
$('#subtotal').html(data['carttotal'])
$('#grandtotal').html(data['grandtotal'])

				   console.log(data);
			   }
		   })
		})
	   
	</script>



</body>
</html>