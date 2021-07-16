@extends('frontend.master')
<style>
 
.tab {
  overflow: hidden;  
  margin-top: 2rem;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;

}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #f70;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #60c3d3;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border-top: none;
}



.image{
position: relative;
max-height: 300px;


}


  .image img{
      max-height: 300px;
  }
  .logos{
     z-index: 99;
     position: absolute;
     top: 65%;
     left: 45%;
     transform: translateY(-50%,-50%)
  }
.logos img{
    width: 140px;
    height: 140px;
border: 2px solid gray;
}






 /* rating  */
 .rating {
	  float:left;
  }
  /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
	 follow these rules. Every browser that supports :checked also supports :not(), so
	 it doesn’t make the test unnecessarily selective */
  .rating:not(:checked) > input {
	  position:absolute;
	  top:-9999px;
	  clip:rect(0,0,0,0);
  }
.col{
	color:rgb(180, 179, 179)!important;

  }
  .rating:not(:checked) > label {
	  float:right;
	  width:1em;
	  padding:0 .1em;
	  overflow:hidden;
	  white-space:nowrap;
	  cursor:pointer;
	  font-size:200%;
	  line-height:1.2;
	  color:rgb(175, 175, 175);
	  text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .rating:not(:checked) > label:before {
	  content: '★';
  }
  
  .rating > input:checked ~ label {
	  color: #f70;
	  text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
  }
  .rtn{
	float: left;
	width: 100%;
  }
  .rating:not(:checked) > label:hover,
  .rating:not(:checked) > label:hover ~ label {
	  color: gold;
	  text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .rating > input:checked + label:hover,
  .rating > input:checked + label:hover ~ label,
  .rating > input:checked ~ label:hover,
  .rating > input:checked ~ label:hover ~ label,
  .rating > label:hover ~ input:checked ~ label {
	  color: #ea0;
	  text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .rating > label:active {
	  position:relative;
	  top:2px;
	  left:2px;
  }
  
  .checked{
	color: orange;
  }
  .at-share-btn-elements{
	  margin-top:35px!important;
  }
  .promo{
    text-decoration: underline;
    color: #f70;
  }
  .badges{
width: 200px;
z-index: 99;
     position: absolute;
     top: 1%;
     left: 85%;
     transform: translateY(-50%,-50%)
  }
  .badge_wrapper{
  padding: 14px 16px;
    
  }
</style>
@section('content')

<div class="container-fluid p-0 m-0">
    <div class="row">
        <div class="col-md-12 p-0 m-0"><div class="image"><img src="{{asset($shop->cover)}}" alt="{{$shop->name}}" class="img-fluid" width="100%" height="300">
        
<div class=" logos "><img src="{{asset($shop->image)}}" alt="{{asset($shop->image)}}"></div>
        
<div class="badges">
  <div class="card badge_wrapper">
    <h6>Badges</h6>
<span class="d-flex my-2">
  @php
      $sell=DB::table('order_details')->where('shop_id',$shop->id)->count();
      $fav=DB::table('favourites')->where('shop_id',$shop->id)->count();

  @endphp
  @if ($sell<10)
  <span class="badge bg-danger text-white mx-2 px-3 py-1">Newbie</span>
      
  @elseif($sell>10 && $sell <100)
  <span class="badge bg-success text-danger mx-2">Popular seller</span>
  @elseif($sell>100)
  <span class="badge bg-success text-danger mx-2">Long Timer</span>

  @endif



  @if ($fav<10)
  <span class="badge bg-danger text-white mx-2 px-3 py-1">Friendly</span>
      
  @elseif($fav>10 && $fav <50)
  <span class="badge bg-success text-info mx-2">Buddy</span>
  @elseif($fav>100 && $fav<500)
  <span class="badge bg-success text-primary mx-2">Nighborly</span>
@else 
<span class="badge bg-success text-warning mx-2">Superstar</span>

  @endif
</span>

@if ( Auth::check() && DB::table('favourites')->where('user_id',Auth::user()->id)->where('shop_id',$shop->id)->first())
<a  class="btn btn-success text-white">Favourite Shop</a>
<a  href="{{route('shop.remove.favourite',['id'=>$shop->id])}}" style="text-decoration: underline;" class="mb-2">Remove from favourite</a>

@else 
<a href="{{route('shop.add.favourite',['id'=>$shop->id])}}" class="btn btn-info">Add to favourite</a>
@endif


<small>Note:badges are based upon favourite seller and sales report</small>

  </div>
</div>
        
        </div>
      
      </div>
<div class="col-md-12 col-12 ">
    <div class="tab card">
      <div class="row">
        <div class="col-md-1">
          <button class="tablinks"  onclick="openCity(event, 'about')">About</button>

        </div>
        <div class="col-md-1">
          <button class="tablinks" onclick="openCity(event, 'gallery')">Gallery</button>

        </div>
        <div class="col-md-1">
          <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'product')">Product</button>

        </div>
        <div class="col-md-1">
          <button class="tablinks"  onclick="openCity(event, 'review')">Reviews</button>

        </div>
        @php
            $ismember=DB::table('users')->where('id',$shop->vendor_id)->value('membership')
        @endphp
       @if ($ismember==2)
       <div class="col-md-1">
        <button class="tablinks"  onclick="openCity(event, 'contact')">Contact</button>

      </div>
       @endif
      </div>

      </div>
    
      <!-- Tab content -->
      <div id="about" class="tabcontent">
        <h3>About us</h3>
        <p>{!!$shop->descr!!}</p>
      </div>
      <div id="gallery" class="tabcontent">
          @php
              $gallery=DB::table('shop_galleries')->where('shop_id',$shop->id)->orderBy('id','desc')->get();
          @endphp
       <div class="row">
           @foreach ($gallery as $item)
           <div class="col-md-1 col-6">
            <img src="{{asset($item->image)}}" alt="{{$shop->name}}" class="img-fluid">
        </div>
           @endforeach
        
       </div>
      </div>
      
      <div id="product" class="tabcontent">
        <h3>PRODUCT FROM THIS SHOP</h3>
      @php
          $product=DB::table('products')->where('shop_id',$shop->id)->where('status',1)->paginate(14);

          
      @endphp
      <div class="row">
          @foreach ($product as $item)
              
       <div class="col-xl-m col-lg-3 col-md-4 col-6 product_wrap">
              
                <div class="card card-sm card-product-grid">
                   @if (Auth::check())
@php
    $w=DB::table('wishlists')->where('user_id',Auth::user()->id)->where('product_id',$item->id)->first();
@endphp
                   @if ($w)
                   <a class="text-right heart"><i class=" fas fa-heart"></i></a>

                   @else 
                   <a class="text-right heart" href="{{ route('addtowishlist',['id'=>$item->id]) }}"><i class=" far fa-heart"></i></a>
                   @endif
@else 
<a class="text-right heart" href="{{ route('addtowishlist',['id'=>$item->id]) }}"><i class=" far fa-heart"></i></a>
                   
                   @endif
                    <a href="{{ route('product',['id'=>$item->id,'name'=>$item->name]) }}" class="img-wrap my-0 py-0"> <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"> </a>
                    <figcaption class="info-wrap d-flex justify-content-between">
                    <span>
                        <a href="{{ route('product',['id'=>$item->id,'name'=>$item->name]) }}" class="title">{{ $item->name }}</a>
                        <ul class="rating-stars my-0 py-0">
                            @php
                          $rev=DB::table('productreviews')->where('product_id',$item->id)->avg('rating');
                          $total=DB::table('productreviews')->where('product_id',$item->id)->get();
                      @endphp
                          <?php for($i=1;$i<=ceil($rev);$i++){ ?>
                            <span class="fa fa-star rstar" ></span>
                            <?php  }?>
                  
                            <?php for($j=1;$j<=5-ceil($rev);$j++) {?>
                           <span class="fas fa-star dstar" ></span>
                            <?php  } ?>
                          </ul>
                        <div class="price my-0 py-0"><span id="price">{{ __getPriceunit()}} </span>{{number_format($item->price_after_comission) }}</div> <!-- price-wrap.// -->

                    </span>
               
                
                    </figcaption>
                    
                </div>
            </div> <!-- col.// -->
        
        
        @endforeach

      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
            {{$product->links()}}
        </div>
      </div>
      </div>
      <div id="review" class="tabcontent">
        <h3>Shop Reviews</h3>
          @php
        $total=DB::table('shopreviews')->where('shop_id',$shop->id)->avg('rating');
        $rev=DB::table('shopreviews')->where('shop_id',$shop->id)->get();
    @endphp
        <?php for($i=1;$i<=ceil($total);$i++){ ?>
          <span class="fa fa-star rstar" ></span>
          <?php  }?>

          <?php for($j=1;$j<=5-ceil($total);$j++) {?>
         <span class="fas fa-star dstar" ></span>
          <?php  } ?>
<h4>{{number_format($total,1)}} rating out of {{count($rev)}} Reviews</h4>
       
          
         
          
          
            @if(Auth::check()&&DB::table('shopreviews')->where('user_id',Auth::user()->id)->where('shop_id',$shop->id)->first())
                     @else 
                        <a href="#" data-toggle="modal" data-target="#reviewmodel" class="review_model badge bg-info text-white mb-1 px-5 py-2">Write  Review</a> 
                     @endif
        
        @php
                 $rev=DB::table('shopreviews')->join('users','users.id','shopreviews.user_id')->where('shopreviews.shop_id',$shop->id)->select('shopreviews.*','users.name','users.profile_photo_path')->get();
        @endphp
            @foreach ($rev as $row)
            <div class="col-md-12">
            <p>
              <h4 class="text-dark d-flex align-items-center">
                @if ($row->profile_photo_path)
                <img src="{{asset($row->profile_photo_path)}}" height="70" width="70" class="rounded-circle">
                @else
                <!--<img src="{{asset('frontend/download.webp')}}" alt="{{$row->profile_photo_path}}" width="40" class="rounded-circle">-->
                  
                @endif
                
                
                
                &nbsp;&nbsp;{{ $row->name }}
              @if (Auth::check() && Auth::user()->id==$row->user_id)
              <p style="margin-left: auto"><a href="" data-toggle="modal" data-target="#editreviewmodel" data-id="{{$row->id}}" class="editreview" style="font-size: 1rem;color:rgb(0, 68, 255);">
          Edit
              </a> | <a href="{{ route('shop.rating.delete',['id'=>$row->id]) }}" style="font-size: 1rem;color:rgb(0, 68, 255);">Delete</a></p>
              @endif
              </h4>

              
              <?php for($i=1;$i<=$row->rating;$i++){ ?>
                <span class="fa fa-star rstar"></span>
                <?php  }?>
            
                <?php for($j=1;$j<=5-$row->rating;$j++) {?>
                 <span class="fas fa-star dstar"></span>
                <?php  } ?>
                <p>
                  {{$row->feedback}}
                </p>
                <small>{{carbon\carbon::parse($row->updated_at)->diffForHumans()}}</small>
                </p>
                <hr style="margin-bottom: 0px">
                 </div>
                @endforeach





      </div>
      @if ($ismember==2)


      <div id="contact" class="tabcontent">
        <h3>Contact </h3>
 <div class="card w-50 px-3 py-2">
  <form action="{{route('shop.contact.store')}}" method="POST">
    @csrf
<input type="hidden" name="vendor_id" value="{{$shop->vendor_id}}">
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" id="" class="form-control"  required>
    </div>
<div class="form-group">
  <label >Description</label>
<textarea name="message" id="" class="form-control" required>
</textarea>

</div>

<input type="submit" value="submit" class="btn btn-info btn-block" >


   </form>
 </div>
      </div>
      @endif
</div>





    </div>
</div>

   {{-- review model  --}}
   <div class="modal fade" id="reviewmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content py-3 px-5">
     
      
      <form action=" {{route('shop.rating.store')}}" method="POST">
        @csrf
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <p>Ratting</p>
        <div class="rtn">
        <fieldset class="rating">
        <input type="radio" id="star5" name="rating" value="5" />
        <label for="star5" title="Rocks!">5 stars</label>
        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
        </fieldset>
        </div>
        
        <p>Review</p>
        <p><textarea class="form-control" name="review"  ></textarea></p>
        
        
        <div class="modal-footer">
        <input type="submit" name="savert" value="Submit" class="btn btn-primary">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
    
      </div>
      
    </div>
    </div>




     {{-- review model  --}}
  <div class="modal fade" id="editreviewmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content py-3 px-5">
      <div class="modal-header">
      
        </div>
       
        
        <form action=" {{route('shop.rating.update')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$shop->id}}">
            <input type="hidden" name="vid" value="" id="vid">
  
          <p>Review</p>
          <p><input class="form-control" name="feedback" required id="text"></p>
          
            
          <div class="modal-footer">
            <input type="submit"  value="Submit" class="btn btn-info btn-sm">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
          </form>
  
      </div>
    </div>
    </div>

@endsection
@push('scripts')

{{-- rewvie edit  --}}
<script>

                 
	$('.editreview').on('click',function(e){
    var id=$(this).data('id');
  $.ajax({
    url:'{{url('shop/review/edit')}}/'+id,
    type:'GET',
    dataType:'json',
    success:function(data){
      $('#text').val(data['feedback']);
      $('#vid').val(data['id']);

    }
  })
  })
            </script>



    <script>
        function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
    </script>
    <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>
@endpush