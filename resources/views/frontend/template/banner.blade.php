<section class="section-main ">
   
    @php
        $banner=DB::table('banners')->where('status',1)->orderBy('id','desc')->get();
        $baneer1=DB::table('banners')->where('status',1)->first();

    @endphp
    <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
    <div id="carousel_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1_indicator" data-slide-to="1"></li>
        <li data-target="#carousel1_indicator" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{  asset($baneer1->image)}}" alt="{{ $baneer1->image }}"> 
        </div> 
        @foreach ($banner  as $item)
        <div class="carousel-item ">
          <img src="{{  asset($item->image)}}" alt="{{ $item->image }}"> 
        </div> 
        @endforeach
        
       
      </div>
      <a class="carousel-control-prev" href="#carousel_indicator" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel_indicator" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> 
    <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	
  
  
  </section>