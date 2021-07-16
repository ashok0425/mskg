<style>
    .add img{
        max-height: 320px;
        position: relative;
    }
   .add .links{
     position: absolute;
     top: 2%;
     left:5% ;
     z-index: 999;
     color: aliceblue;
     font-weight: bold;
     text-decoration: underline;
   }
</style>
<section class="section-main pt-0 px-0 mt-0 mx-0 mb-1 add">
   
    @php
        $banner=DB::table('advertisments')->where('status',1)->orderBy('id','desc')->get();
        $baneer1=DB::table('advertisments')->where('status',1)->first();

    @endphp
    <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
    <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{  asset($baneer1->image)}}" alt="{{ $baneer1->image }}"> 
          <a href="{{$baneer1->title}}" class="links" target="_blank">Visit Advertisment</a>

        </div> 
        @foreach ($banner  as $item)
        <div class="carousel-item ">
          <img src="{{  asset($item->image)}}" alt="{{ $item->image }}"> 
          <a href="{{$item->title}}" class="links" target="_blank">Visit Advertisment</a>
        </div> 
        @endforeach
        
       
      </div>
      <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> 
    <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	
  
  
  </section>