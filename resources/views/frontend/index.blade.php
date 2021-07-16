@extends('frontend.master')
@section('content')
	<!-- ========================= SECTION MAIN  ========================= -->


@include('frontend.template.banner')

<!-- ========================= SECTION MAIN END// ========================= -->



<!-- =============== SECTION DEAL =============== -->
{{-- @include('frontend.template.deal') --}}
@include('frontend.template.featured')
@include('frontend.template.bestseller')
<!-- container end.// -->
@include('frontend.template.category')
@include('frontend.template.newarrival')
@include('frontend.template.toprated')


<!-- container end.// -->
@include('frontend.template.add')
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
	dots:true,
	responsiveClass:true,
    responsive:{
		0:{
            items:1
        },
        600:{
            items:6
        },
		1000:{
            items:9
        }
    }
});

</script>
@endpush