@extends('frontend.master')
@section('content')
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-9 -->
    <!--Main Slider-->


    <div class="c-layout-breadcrumbs-1 c-bgimage" style="background-image: url({{asset('frontend/img/content/backgrounds/bg-10.jpg')}}); background-repeat: no-repeat; background-size: cover "">
        <div class="container">
            <div class="c-content-title-1 text-center">
                <h3>Our Blogs</h3>
                <h5 class="text-white"><a href ="index.php">Home /</a> Blogs</h5>
            </div>
        </div>
    </div>
    <!-- END: LAYOUT TITLE / BREADCRUMBS -->
    <!-- BEGIN: Bring Your Performance -->


    <div class="c-content-box c-size-md c-bg-white ltst-warp-hm">
      <div class="container">



        <div class="row">
          <div class="col-sm-6 wow animated htwoBlogLeft clearfix fadeInLeft">
            <div class="col-sm-6 col-xs-6"><img alt="" class="img-responsive" src="{{asset('frontend/img/ltst-img1.jpg')}}">
            </div>


            <div class="col-sm-6 col-xs-6">
              <h6 class="lts-abslt-tils">Health / Fitness Tips</h6>
              <!-- Begin: Title 1 component -->


              <div class="c-content-title-1">
                <h4 class="headingWline">Tips For An Better Workout</h4>
            </div>
            <!-- End-->


            <p>Aliquam aliquet lectus non laoreet mo lestie. Sed vel justo a risus rhoncus aliquet sed.</p>

            <div class="row">
                <ul class="c-content-list-1">
                            <li><a href="{{route('blog.detail',['id'=>1])}}">Read More</a></li>

              </ul>
          </div>
          
      </div>
  </div>


  <div class="col-sm-6 wow animated htwoBlogLeft clearfix fadeInRight">
    <div class="col-sm-6 col-xs-6"><img alt="" class="img-responsive" src="{{asset('frontend/img/ltst-img2.jpg')}}">
    </div>


    <div class="col-sm-6 col-xs-6">
      <h6 class="lts-abslt-tils">Health / Fitness Tips</h6>
      <!-- Begin: Title 1 component -->


      <div class="c-content-title-1">
        <h4 class="headingWline">Tips For An Better Workout</h4>
    </div>
    <!-- End-->


    <p>Aliquam aliquet lectus non laoreet mo lestie. Sed vel justo a risus rhoncus aliquet sed.</p>


    <div class="row">
        <ul class="c-content-list-1">
                    <li><a href="{{route('blog.detail',['id'=>1])}}">Read More</a></li>

      </ul>
  </div>
</div>
</div>
<div class="col-sm-6 wow animated htwoBlogLeft clearfix fadeInLeft">
    <div class="col-sm-6 col-xs-6"><img alt="" class="img-responsive" src="{{asset('frontend/img/ltst-img1.jpg')}}">
    </div>


    <div class="col-sm-6 col-xs-6">
      <h6 class="lts-abslt-tils">Health / Fitness Tips</h6>
      <!-- Begin: Title 1 component -->


      <div class="c-content-title-1">
        <h4 class="headingWline">Tips For An Better Workout</h4>
    </div>
    <!-- End-->


    <p>Aliquam aliquet lectus non laoreet mo lestie. Sed vel justo a risus rhoncus aliquet sed.</p>

    <div class="row">
        <ul class="c-content-list-1">
                    <li><a href="{{route('blog.detail',['id'=>1])}}">Read More</a></li>

      </ul>
  </div>
  
</div>
</div>


<div class="col-sm-6 wow animated htwoBlogLeft clearfix fadeInRight">
    <div class="col-sm-6 col-xs-6"><img alt="" class="img-responsive" src="{{asset('frontend/img/ltst-img2.jpg')}}">
    </div>


    <div class="col-sm-6 col-xs-6">
      <h6 class="lts-abslt-tils">Health / Fitness Tips</h6>
      <!-- Begin: Title 1 component -->


      <div class="c-content-title-1">
        <h4 class="headingWline">Tips For An Better Workout</h4>
    </div>
    <!-- End-->


    <p>Aliquam aliquet lectus non laoreet mo lestie. Sed vel justo a risus rhoncus aliquet sed.</p>


    <div class="row">
        <ul class="c-content-list-1">
                    <li><a href="{{route('blog.detail',['id'=>1])}}">Read More</a></li>

      </ul>
  </div>
</div>
</div>
</div>
</div>
</div>


@endsection