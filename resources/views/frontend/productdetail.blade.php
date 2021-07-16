

@section('title')
{!! strip_tags( $product->meta_title)!!}
@endsection
@section('img')
{!! asset( $product->image)!!}
@endsection
@section('descr')
{!!$product->meta_descr!!}
@endsection
@section('keyword')
{!! strip_tags( $product->meta_title)!!}
@endsection

@extends('frontend.master')
@section('content')

<link rel="stylesheet" href="{{ asset('frontend/css/productinfo.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/jquery.exzoom.css')}}" />

<style>
.sv-product-info-checkout .fa-heart{
    font-size:2.3rem!important;
    
}
@media screen and (max-width: 700px){
    .zoomContainer{
        display:none!important;
    }
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
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
  background-color: orangered;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #60c3d3;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
#gallery_01 img{border:2px solid white;}
 
 /*Change the colour*/
 .active img{border:2px solid #333 !important;}

 /* rating  */
 .shoprating {
	  float:left;
  }
  /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
	 follow these rules. Every browser that supports :checked also supports :not(), so
	 it doesn’t make the test unnecessarily selective */
  .shoprating:not(:checked) > input {
	  position:absolute;
	  top:-9999px;
	  clip:rect(0,0,0,0);
  }
.col{
	color:rgb(180, 179, 179)!important;

  }
  .shoprating:not(:checked) > label {
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
  
  .shoprating:not(:checked) > label:before {
	  content: '★';
  }
  
  .shoprating > input:checked ~ label {
	  color: orangered;
	  text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
  }
  .rtn{
	float: left;
	width: 100%;
  }
  .shoprating:not(:checked) > label:hover,
  .shoprating:not(:checked) > label:hover ~ label {
	  color: orangered;
	  text-shadow:1px 1px orangered, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .shoprating > input:checked + label:hover,
  .shoprating > input:checked + label:hover ~ label,
  .shoprating > input:checked ~ label:hover,
  .shoprating > input:checked ~ label:hover ~ label,
  .shoprating > label:hover ~ input:checked ~ label {
	  color: orangered;
	  text-shadow:1px 1px orangered, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .shoprating > label:active {
	  position:relative;
	  top:2px;
	  left:2px;
  }
  
  .shoprating .checked{
	color: orangered;
  }
 

.font_1{
    font-size:1.2rem!important;
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
	  color: orangered;
	  text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
  }
  .rtn{
	float: left;
	width: 100%;
  }
  .rating:not(:checked) > label:hover,
  .rating:not(:checked) > label:hover ~ label {
	  color: orangered;
	  text-shadow:1px 1px orangered, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .rating > input:checked + label:hover,
  .rating > input:checked + label:hover ~ label,
  .rating > input:checked ~ label:hover,
  .rating > input:checked ~ label:hover ~ label,
  .rating > label:hover ~ input:checked ~ label {
	  color: orangered;
	  text-shadow:1px 1px orangered, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
  }
  
  .rating > label:active {
	  position:relative;
	  top:2px;
	  left:2px;
  }
  
  .checked{
	color: orangered;
  }
 
  .promo{
    text-decoration: underline;
    color: orangered;
  }
  @keyframes shake {
	0% {
		transform: rotate(0deg);
	}

	25% {
		transform: rotate(10deg);
	}

	50% {
		transform: rotate(0deg);
	}

	75% {
		transform: rotate(-10deg);
	}

	100% {
		transform: rotate(0deg);
	}
}
.col_img{
 width:30px!important;
 height:30px!important;
 margin:auto;
 border-radius:50%;
 z-index:-1;
 visibility: hidden;
}
.sv-product-info .fa-heart{
    border-radius:50%;
}
</style>

    <div class=" sv-product-info mt-5 ">

            <div class="container-fluid card py-3">

         <div class="row ">
           <div class="col-md-5">
               
                  <div class="row">
  <div class="col-md-10  text-right">
                     @if (Auth::check())
              @php
                  $w=DB::table('wishlists')->where('user_id',Auth::user()->id)->where('product_id',$product->id)->first();
              @endphp
                                 @if ($w)
                                 <a class="  heart"><i class=" fas fa-heart shadow  p-2"></i></a>
              
                                 @else 
                                 <a class="heart" href="{{ route('addtowishlist',['id'=>$product->id]) }}"><i class="far fa-heart shadow p-2"></i></a>
                                 @endif
              @else 
              <a class="heart" href="{{ route('addtowishlist',['id'=>$product->id]) }}"><i class="far fa-heart shadow p-2"></i></a>
                                 
                                 @endif  
                    </div>
                         <!--<div class="col-md-2 "></div>-->
                    <div class="col-md-3 col-4">
            
                      <div id="gal1" >
           
                        
                           
                      <ul>
                     @if ($product->image)
                        <a href="#" data-image="{{asset($product->image) }}" data-zoom-image="{{asset($product->image) }}" >
                          <img id="img_01" src="{{asset($product->image) }}" class="img-fluser_id mb-0" style="max-width:50px;max-height:50px;margin:auto;"/>
                         <!--<br> <small class="mb-5">Thumbnail </small>-->
                        </a>
                      <p></p>
                       
                        @endif
                        @if ($product->front)
                        <a href="#" data-image="{{asset($product->front) }}" data-zoom-image="{{asset($product->front) }}" >
                          <img id="img_01" src="{{asset($product->front) }}" class="img-fluser_id mb-0" style="max-width:50px;max-height:50px;margin:auto;"/>
                         <!--<br> <small class="mb-5">Front view</small>-->
                        </a>
                        <p></p>
                        @endif
                         
                        @if ($product->back)
                        <a href="#" data-image="{{asset($product->back) }}" data-zoom-image="{{asset($product->back) }}" >
                          <img id="img_01" src="{{asset($product->back) }}" class="img-fluser_id mb-0" style="max-width:50px;max-height:50px;margin:auto;"/>
                       <!--<br> <small class="mb-5">-->
                       <!--   Back view-->
                       <!-- </small>-->
                        </a>
                        <p></p>
                        @endif
                        @if ($product->left)
                        <a href="#" data-image="{{asset($product->left) }}" data-zoom-image="{{asset($product->left) }}" >
                          <img id="img_01" src="{{asset($product->left) }}" class="img-fluser_id mb-0 text-center mx-auto" style="max-width:50px;max-height:50px;margin:auto;"/>
                        <!--<br> <small class="mb-5">-->
                        <!--    Left view-->
                        <!--  </small>-->
                        </a>
                        <p></p>
                        @endif
                        @if ($product->right)
                        <a href="#" data-image="{{asset($product->right) }}" data-zoom-image="{{asset($product->right) }}" >
                          <img id="img_01" src="{{asset($product->right) }}" class="img-fluser_id mb-0"style="max-width:50px;max-height:50px;margin:auto;"/>
                        <!--<br> <small class="mb-5">-->
                        <!--  Right View-->
                        <!-- </small>-->
                        </a>
                        <p></p>
                        @endif
            
                    </ul>
                  </div>
            
                     </div>
                     
                     <div class="col-md-7 col-8" >
                           <br/>
                        <div >
                          
                          
                          <img id="zoom_01" src='{{asset($product->image) }}' data-zoom-image="{{asset($product->image) }}"  class="main_image img-fluid" />
                          
                        </div>
                        <div>
                            
                        </div>
                     </div>
                  
          <div class="col-md-6 offset-md-3 mt-5">
             <!-- Go to www.addthis.com/dashboard to customize your tools -->
             <div class="addthis_inline_share_toolbox"></div>
            
             <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60c809a3e6cdb001"></script>
          </div>
                      
                     </div>
                    
                  </div>
           
     
              <div class="col-md-5 ">
                <div class="sv-product-info-title">
                  <h2 class="mb-0">{{ $product->name }} </h2>
                  <ul class="rating-stars my-2">
                  @php
                $rev=DB::table('productreviews')->where('product_id',$product->id)->avg('rating');
                $total=DB::table('productreviews')->where('product_id',$product->id)->get();
            @endphp
                <?php for($i=1;$i<=ceil($rev);$i++){ ?>
                  <span class="fa fa-star rstar" ></span>
                  <?php  }?>
        
                  <?php for($j=1;$j<=5-ceil($rev);$j++) {?>
                 <span class="fas fa-star dstar"></span>
                  <?php  } ?>
                </ul>
                <small class="label-rating text-muted">{{count($total)}} reviews | <a href="#"data-toggle="modal" data-target="#reviewmodel">Give feedback</a></small>
                <a href="#" data-toggle="modal" data-target="#report" class="badge bg-info text-white mr-1">Report Product</a>
                  <p class="mb-2">@php
                      
                      $shop=DB::table('shops')->where('id', $product->shop_id)->value('name');
                  @endphp  @if ($product->shop_id!==null) Shop : <a href="{{route('shop',['id'=>$product->shop_id,'name'=>$product->name])}}" > {{ $shop }} </a>| <a href="{{route('shop.add.favourite',['id'=>$product->shop_id])}}" class="promo" >Add to favourite</a>
                  

      @endif
      
       @if($product->shop_id!==null)
                  <a href="{{route('shop',['id'=>$product->shop_id,'name'=>$product->name])}}" class="badge bg-info text-white mr-1">Contact Seller</a>
                  @endif

 </p>
      <p> <span class="text-dark">Category</span> : <a href="{{ route('store.category',['id'=>$product->category_id,'name'=>$product->category]) }}">{{ $product->category }}</a>
                   @if($product->Iscustomized)
                   <a href="" data-toggle="modal" data-target="#customize" class="badge bg-info text-white mr-1">Customize Product</a>
                  @endif
                  
                  </p>
  <p>
      {!! $product->short_desc !!}
  </p>
   

                </div>
               
                
             
                
                <div class="sv-product-info-price">
                  @php
                      $price=DB::table('productvariations')->where('product_id',$product->id)->first();
                  @endphp
               
                  <h3>{{ __getPriceunit() }}<span class="Vprice">

                    @if (session()->has('vendorcoupon')&&session()->get('vendorcoupon')['vendor_id']==$product->vendor_id)
                        
                    @if($price)
                    {{number_format($price->price_after_comission-($price->price_after_comission*session()->get('vendorcoupon')['discount']/100),2)}}
                      @else 
                      {{number_format($product->price_after_comission-($product->price_after_comission*session()->get('vendorcoupon')['discount']/100),2)}}

                  @endif

                    @else 
                    @if($price)
                    {{number_format($price->price_after_comission)}}
                      @else 
                    {{number_format($product->price_after_comission)}}
                  @endif
                    @endif
                   
                    </span> @if (session()->has('vendorcoupon')&&session()->get('vendorcoupon')['vendor_id']==$product->vendor_id)

<small class="text-success font_1">Coupon ({{session()->get('vendorcoupon')['name']}}) Applied &nbsp;&nbsp; 

  <span><a href="{{ route('vendor.coupon.remove') }}" class="text-danger">Remove Coupon</a></span>

</small>
@else 
<a href="" class="promo font_1" data-toggle="modal" data-target="#promo"><small>Have a Coupon Code?</small> </a>
@endif</h3>
                  </div>
                 
    
                  <p> <span class="text-dark">Delivery Time</span> : {{ $product->delivery_time }}</p>
    
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="{{ $product->vendor_id}}" class="vid">

                <input type="hidden" name="price" class="pricevalue" value=" 
                @if (session()->has('vendorcoupon')&&session()->get('vendorcoupon')['vendor_id']==$product->vendor_id)
                        
                    @if($price)
                    {{$price->price_after_comission-($price->price_after_comission*session()->get('vendorcoupon')['discount']/100)}}
                      @else 
                      {{$product->price_after_comission-($product->price_after_comission*session()->get('vendorcoupon')['discount']/100)}}

                  @endif

                    @else 
                    @if($price)
                    {{$price->price_after_comission}}
                      @else 
                    {{$product->price_after_comission}}
                  @endif
                    @endif" >

                
                @if (count($color)>0)
                <div id="gal1" >

                <div class="sv-product-info-colors my-4">
    
                  <div class="sv-product-info-colors-wrapper colors">
                        @foreach ($color as $item)

                        <input  type="hidden"  name="color" class="color" >
                       
                        <label style="background: {{ $item->color }}"  class="label">
                        <a href="#" data-image="{{asset($item->image) }}" data-zoom-image="{{asset($item->image) }}" class="cold" data-text='{{$item->id}}'>  
           
                        
                          <img id="img_01 " src="{{asset($item->image) }}" class="img-fluser_id mb-3 col_img" data-text="color{{$item->id}}"/>
                      
                      
                        </a>        
                                </label>


                      
                        @endforeach
                    
                   
                      
                  </div>
                </div> 
              </div>

                @endif
         @if (count($variation)>0)
         <div class="sv-product-info-storage mt-5">
          <div class="sv-product-info-storage-wrapper buttongroup mt-2">
            
          @foreach ($variation as $item)
      <span>
    
        <input id="{{ $item->variation }}" type="radio" value="{{ $item->id }}" name="storage" class="variation "  @if ($loop->first)
        checked="checked"
        @endif /> 
        <label for="{{ $item->variation }}" class="storage  ">    
            {{ $item->variation }}
        </label>
      </span>
            
          @endforeach
        </div>
          
        </div>
         @endif
    
         
         <div class="qty mt-3 d-flex ">

          <button  class="incrementbtn px-3  text-white" style="background: #60c3d3;border-color:#60c3d3" type="button" data-input="demoInput{{ $product->id }}" data-id="{{ $product->id }}" data-price="{{ $product->price_after_comission }}" @if (Session::has('coupon')) disabled title="You can't increase item quantity once coupon is applied"
              
          @endif>+</button> 
          <input id="demoInput{{ $product->id }}" type="number" readonly value="1" class="value text-center  py-1 pl-3" name="qty" style="max-width: 50px" min="1">
    
          <button  class="decrementbtn px-3  text-white" style="background: #60c3d3;border-color:#60c3d3;" type="button" data-input="demoInput{{ $product->id }}" data-id="{{ $product->id }}" data-price="{{ $product->price_after_comission }}" @if (Session::has('coupon'))disabled
              title="You can't descrease item quantity once coupon is applied"
          @endif>-</button>
        </div>
               
                <div class="sv-product-info-checkout d-flex align-items-center">
                  <input type="submit" value="Add to Cart" name="submit">
                  <input type="submit" name="submit" value="Buy Now">
 
                </div>
                
        </form>
        


              </div>
            
            </div>
          </div>

 
    
  

    <div class="container-fluid">

      <!-- product info bottom -->
      <div class="row mt-5">
        <!-- left section -->
        <div class="col-md-12  product_descr">
                <!-- Tab links -->
<div class="tab">
  <button class="tablinks " onclick="openCity(event, 'description')" >Description</button>
  <button class="tablinks" onclick="openCity(event, 'features')">Features</button>
  <button class="tablinks" onclick="openCity(event, 'term')">Terms & Conditions</button>
  <button class="tablinks" onclick="openCity(event, 'productreview')" id="productreviews">Product Reviews</button>
  <button class="tablinks" onclick="openCity(event, 'shopreview')">Shop Review</button>


</div>

<!-- Tab content -->
<div id="description" class="tabcontent">
  <h3>Product Description</h3>
  <div class="sv-product-info-desc">
    {!! $product->descr !!}
   </div>
</div>

<div id="features" class="tabcontent">
  <h3>Features</h3>
  {!!$product->material!!}

</div>

<div id="term" class="tabcontent">
  <h3>Terms & Conditions</h3>
 {!!$product->term!!}
</div>

<div id="productreview" class="tabcontent">
  <div class="sv-product-info-bottom-right-title">
    <h4>Product Reviews</h4>
  <!-- Button trigger modal -->



    <?php
    $revs=DB::table('productreviews')->join('users','users.id','productreviews.user_id')->where('productreviews.product_id',$product->id)->select('productreviews.*','users.name','users.profile_photo_path')->orderBy('id','desc')->get();
                        ?>
                        <div class="row">
                         
                    <div class="col-md-12">
                      <?php for($i=1;$i<=ceil($rev);$i++){ ?>
                        <span class="fa fa-star rstar" ></span>
                        <?php  }?>
                      
                        <?php for($j=1;$j<=5-ceil($rev);$j++) {?>
                       <span class="fas fa-star dstar" ></span>
                        <?php  } ?>
                      @if (count($total)>0)
<h4>{{number_format($rev,1)}} rating out of {{count($total)}} Reviews</h4>
      @else
        <div style="color: #f70!important;">No reviews yet</div>
      
  @endif
  
                     @if(Auth::check()&&DB::table('productreviews')->where('user_id',Auth::user()->id)->where('product_id',$product->id)->first())
                     @else 
                      <a href="#" data-toggle="modal" data-target="#reviewmodel" class="review_model badge bg-info text-white mb-1 px-5 py-2">Write  Review</a> 
                     @endif
                    </div>
                        @foreach ($revs as $row)
                        <div class="col-md-12">
                        <p>
                        <h4 class="text-dark d-flex align-items-center">
                          @if ($row->profile_photo_path)
                          <img src="{{asset($row->profile_photo_path)}}" alt=""  class="rounded-circle" width='70' height='70'>
                          @else
                         
                            
                          @endif
                
                          &nbsp;&nbsp;{{ $row->name }}
                        @if (Auth::check() && Auth::user()->id==$row->user_id)
                        <p style="margin-left: auto"><a href="" data-toggle="modal" data-target="#editreviewmodel" data-id="{{$row->id}}" class="editreview" style="font-size: 1rem;color:rgb(0, 68, 255);">
                    Edit
                        </a> | <a href="{{ route('product.rating.delete',['id'=>$row->id]) }}" style="font-size: 1rem;color:rgb(0, 68, 255);">Delete</a></p>
                        @endif
                        </h4>
                    
                        <?php for($i=1;$i<=$row->rating;$i++){ ?>
                        <span class="fa fa-star rstar"></span>
                        <?php  }?>
                    
                        <?php for($j=1;$j<=5-$row->rating;$j++) {?>
                         <span class="fa fa-star dstar"></span>
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
  
</div>
</div>
<div id="shopreview" class="tabcontent">
  <h3>Shop Reviews</h3>
  @php
$total=DB::table('shopreviews')->where('shop_id',$product->shop_id)->avg('rating');
$rev=DB::table('shopreviews')->where('shop_id',$product->shop_id)->get();
@endphp
<?php for($i=1;$i<=ceil($total);$i++){ ?>
  <span class="fa fa-star rstar" ></span>
  <?php  }?>

  <?php for($j=1;$j<=5-ceil($total);$j++) {?>
 <span class="fas fa-star dstar" ></span>
  <?php  } ?>
  @if ($total>0)
<h4>{{number_format($total,1)}} rating out of {{count($rev)}} Reviews</h4>
      @else
        <div style="color: #f70!important;">No reviews yet</div>
      
  @endif
 

@php
         $rev=DB::table('shopreviews')->join('users','users.id','shopreviews.user_id')->where('shopreviews.shop_id',$product->shop_id)->select('shopreviews.*','users.name','users.profile_photo_path')->get();
@endphp
    @foreach ($rev as $row)
    <div class="col-md-12">
    <p>
      <h4 class="text-dark d-flex align-items-center">
        @if ($row->profile_photo_path)
        <img src="{{asset($row->profile_photo_path)}}"  width="40" height="40" class="rounded-circle">
        @else
     
          
        @endif
        
        
        
        &nbsp;&nbsp;{{ $row->name }}
      @if (Auth::check() && Auth::user()->id==$row->user_id)
      <a href="{{ route('shop.rating.delete',['id'=>$row->id]) }}" style="font-size: 1rem;color:rgb(0, 68, 255);">Delete</a></p>
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
        </div>
       
    </div>
  </div>


 {{-- product from same store  --}}
<div class="container-fluid">

 <section  class="padding-bottom-sm mt-5">
  @php
      $products=DB::table('products')->where('shop_id',$product->shop_id)->where('status',1)->limit(12)->get();
  @endphp
      <header class="section-heading heading-line">
          <h4 class="title-section text-uppercase">More items from Same Store</h4>
      </header>
      
      <div class="row row-sm">
          @foreach ($products as $item)
            <div class="col-xl-m col-lg-2 col-md-3 col-6 col-sm-3 product_wrap mb-1">
              
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
       
      </div> <!-- row.// -->
      </section>

    </div>


 {{-- review model  edit--}}
 <div class="modal fade" id="editreviewmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content py-3 px-5">
    <div class="modal-header">
    
      </div>
     
      
      <form action=" {{route('product.rating.update')}}" method="POST">
          @csrf
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



    {{-- review model store --}}
  <div class="modal fade" id="reviewmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content py-3 px-5">
     
      
      <form action=" {{route('product.rating.store')}}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
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


     {{-- promocode model  --}}
  <div class="modal fade" id="promo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content text-center py-5">
     <div class="modal-body">

        <form action="{{ route('vendorcoupon') }}" class="mt-2 coupon" method="POST">
          @csrf
         Enter Your Coupon Code
          <br>
         <div class="d-flex justify-content-center">
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="vendor_id" value="{{ $product->vendor_id }}">
            <input type="text" name="coupon" required  class="" autocomplete="off">
            <input type="submit" value="Apply" class='bg-info'>
         </div>
          </form>
     </div>
 
      </div>
    </div>
    </div>

         {{-- Customize model  --}}
  <div class="modal fade" id="customize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content text-center py-5">
     <div class="modal-body">

        <form action="{{ route('product.customize') }}" class="mt-2 coupon" method="POST" enctype="multipart/form-data">
          @csrf
          
         <div class="">
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="vid" value="{{ $product->vendor_id }}">
          <div class="image-input">
            <input type="file" accept="image/*" id="imageInput" name="file">
           
            <img src="" class="image-preview" width="100">
          </div>
          <br>

            <h6>Explain Features You want to customize</h6>
            <textarea name="msg" id="" class="form-control" required></textarea>
            <br>
            <input type="submit" value="Submit">
         </div>
          </form>
     </div>
 
      </div>
    </div>
    </div>

    <!--Report product -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		    <h2>Report Product</h2>
	 <form method="post" action="{{route('product.report')}}">
    <input type="hidden" name="id" value="{{$product->id}}">
    <input type="hidden" name="vid" value="{{$product->vendor_id}}">

	  @csrf
	  <div class="modal-body">
		  <label> Please provide feedback on product</label>
		  <textarea  name="reason" required="required" class="form-control" required></textarea>
	  </div>
  
	   <button class="btn btn-danger" type="submit">Report Now </button>
  
	 </form>
  
  
		</div>
  
	  </div>
	</div>
  </div>
</div>
  </div>


  @endsection
 
  @push('scripts')
 
  <script>

  $("#zoom_01").elevateZoom({
	zoomType				: "lens",
	 lensShape : "round",
	lensSize    : 150,
	gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true}); 
  
  //pass the images to Fancybox
  $("#zoom_01").bind("click", function(e) {  
	var ez =   $('#zoom_01').data('elevateZoom');	
	  $.fancybox(ez.getGalleryList());
	return false;
  });
	</script>



<script>

                 
	$('.editreview').on('click',function(e){
    var id=$(this).data('id');
  $.ajax({
    url:'{{url('product/review/edit')}}/'+id,
    type:'GET',
    dataType:'json',
    success:function(data){
      $('#text').val(data['feedback']);
      $('#vid').val(data['id']);

    }
  })
  })
            </script>

  {{-- load image using ajax according to color --}}
<script>
    $('.cold').on('click',function(){
$(this).parent('.label').css('border','3px solid #60c3d3');
$(this).parent('.label').siblings().css('border','0');
$id=$(this).data('text');
$(".color").val($id);



  //     let val=$(this).siblings('.img').val();
  //     $.ajax({
  //       url:'{{ url('loadimage') }}/'+val,
  //       type:'GET',
  //       DataType:'Json',
  //       beforeSend:function(){
  //         $('.loading').css('display','block')
  //       },
  //       success:function(data){
  //         $('.main_image').attr('src','');
  
  //         $('.main_image').attr('src',data);
  //         $(function(){
  
  // $("#exzoom").exzoom({
  //   // options here
  // });
  
  // })
  //       },
  //       complete:function(){
  //         $('.loading').css('display','none')
  //       }
  //     })
    })
    </script>  
      <script>
        $('.storage').click(function(){
          let val=$(this).siblings('.variation').val();
          let vid=$('.vid').val();

          $.ajax({
            url:'{{ url('loadprice') }}/'+val+'/'+vid,
            type:'GET',
            DataType:'Json',
            // beforeSend:function(){
            //   $('.loading').css('display','block')
            // },
            success:function(data){
              $('.Vprice').html(" "+data);
              $('.pricevalue').val(data);

              
            },
            // complete:function(){
            //   $('.loading').css('display','none!important')
            // }
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
  
  document.getElementById("productreviews").click();
  
        </script>
  
  @endpush