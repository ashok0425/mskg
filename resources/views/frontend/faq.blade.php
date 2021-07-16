
@extends('frontend.master')
<style>
.cols:focus{
    outline:none!important;
  
}
.cols{
      width:100%;

    display:block;
}
</style>
@section('content')

@section('header')
<section class="section-pagetop bg-gray ">
    <div class="container">
        <h2 class="title-page">Faq</h2>
    </div> <!-- container //  -->
    </section>
@endsection
<div class="container my-5">
@foreach ($blog as $item)
    <p class="cols">
 
  <button  data-toggle="collapse" data-target="#collapseExample{{$item->id}}" aria-expanded="false" aria-controls="collapseExample" class="border-0 px-5  outline-0 cols py-3 @if($loop->first)active @endif">
    {{$item->title}}
  </button>
</p>
<div class="collapse @if($loop->first)show @endif" id="collapseExample{{$item->id}}">
  <div class="card card-body">
    {{$item->desrc}}

  </div>
</div>
@endforeach



</div>

@endsection

