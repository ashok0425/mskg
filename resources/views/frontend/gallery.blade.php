@extends('frontend.master')
@section('content')

<div class="c-layout-page">
  <!-- BEGIN: PAGE CONTENT -->
  <!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-9 -->
  <!--Main Slider-->


  <div class="c-layout-breadcrumbs-1 c-bgimage" style="background-image: url({{asset('frontend/img/content/backgrounds/bg-10.jpg')}}); background-repeat: no-repeat; background-size: cover ">
    <div class="container">
      <div class="c-content-title-1 text-center">
        <h3>Our Gallery</h3>
        <h5 class="text-white"><a href ="index.php">Home /</a> Gallery</h5>
      </div>
    </div>
  </div>
  <!-- END: LAYOUT TITLE / BREADCRUMBS -->
  <!-- BEGIN: Bring Your Performance -->


     <section class="gallery sec-padd style-2 grid-page">
      <div class="container">

        <ul class="post-filter style-2 list-inline float_left">
          <li class="active" data-filter=".filter-item">
            <span>ALL CLASSES</span>
          </li>
          <li data-filter=".Ecology">
            <span>BODY BUILDING</span>
          </li>
          <li data-filter=".Wild-Animals">
            <span>BOXING</span>
          </li>
         
          <li data-filter=".Pollution">
            <span>FITNESS</span>
          </li>
          
        </ul>

        <div class="row filter-layout">
          <article class="padding-style2 col-md-3 col-sm-3 col-xs-6 filter-item Wild-Animals Pollution Water">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img5.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img5.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article> 
          <article class="padding-style2 col-md-6 col-sm-6 col-xs-12 filter-item Pollution Ecology Recycling">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img6.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img6.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article> 
          <article class="padding-style2 col-md-3 col-sm-3 col-xs-6 filter-item Wild-Animals Pollution martial Recycling">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img7.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img7.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article>
          <article class="padding-style2 col-md-6 col-sm-6 col-xs-12 filter-item Water">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img1.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img1.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article> 
          <article class="padding-style2 col-md-3 col-sm-3 col-xs-6 filter-item Wild-Animals Pollution Recycling">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img2.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img2.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article> 
          <article class="padding-style2 col-md-3 col-sm-3 col-xs-6 filter-item Wild-Animals Pollution Ecology Recycling">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img3.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img3.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article>


          <article class="padding-style2 col-md-6 col-sm-6 col-xs-12 filter-item Wild-Animals Pollution martial">
            <div class="item">
              <div class="img-box">
                <img src="{{asset('frontend/img/content/gallery/mas/img4.jpg')}}" alt="">
                <div class="overlay">
                  <div class="inner-box">
                    <div class="content-box">
                      <a data-group="1" href="{{asset('frontend/img/content/gallery/mas/img1.jpg')}}" class="img-popup"><i class="fa fa-search-plus"></i></a>
                     
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </article>


        </div>
        

      </div>
    </section>




    
@endsection