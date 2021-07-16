@extends('frontend.master')
@section('content')
    
<style>
    .ui-slider .ui-slider-handle{
        height: 20px;
        width:  15px;
top: -10px;
    }
    input[type=number]{
      border-radius: 10px;
      padding: .5rem 0;
      width: 45%;
      border: none;
      outline: none;
margin-top: .3rem;;
      border: 2px solid var( --info);
      text-align: center;
    }
    input[type=button]{
      border-radius: 10px;
      padding: .5rem 0;
      border: none;
      outline: none;
margin-top: .3rem;;
      border: 2px solid var( --info);
      text-align: center;
      color: #fff;
      background: var( --info);
      width:90%;
    }
</style>

<div class="row my-5" >
	<aside class="col-md-2">
        <article class="filter-group">


            <h6 class="title">
                <a > Price Range </a>
            </h6>

                 <div id="mySlider" style="height: 5px;background-color:rgb(15, 228, 217);width:90%;margin:.8rem auto;"></div> 
              
                    <input type="number" name="" id="hidden_min" value="0" />
                    <input type="number" name="" id="hidden_max" value="25000" />
                    <input type="button" name="" id="apply" value="Apply" />

                

        </article>
        {{-- catgeory  --}}
@php
    $type=DB::table('categories')->where('status',1)->get();
@endphp
        <article class="filter-group">
            <h6 class="title">
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_1"> Product Type </a>
            </h6>
            <div class="filter-content collapse show" id="collapse_1">
                <div class="inner">
                    @foreach ($type as $item)
                        
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox"  class="custom-control-input selector category" value="{{ $item->id }}">
                      <div class="custom-control-label">{{ $item->category }}  
                        @php
                            $total=DB::table('products')->where('category_id',$item->id)->where('status',1)->get();
                        @endphp
                          <b class="badge badge-pill badge-light float-right">{{ count($total) }}</b>  </div>
                    </label>
                    @endforeach

                    
                </div> <!-- inner.// -->
            </div>
        </article> <!-- filter-group .// -->


       {{-- Brand 
       @php
       $type=DB::table('subcategories')->where('status',1)->get();
   @endphp
           <article class="filter-group">
               <h6 class="title">
                   <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_2"> Brand </a>
               </h6>
               <div class="filter-content collapse show" id="collapse_2">
                   <div class="inner">
                       @foreach ($type as $item)
                           
                       <label class="custom-control custom-checkbox">
                         <input type="checkbox"  class="custom-control-input selector subcategory" value="{{ $item->id }}">
                         <div class="custom-control-label">{{ $item->subcategory }}  
                           @php
                               $total=DB::table('products')->where('subcategory_id',$item->id)->where('status',1)->get();
                           @endphp
                             <b class="badge badge-pill badge-light float-right">{{ count($total) }}</b>  </div>
                       </label>
                       @endforeach
   
                       
                   </div> <!-- inner.// -->
               </div>
           </article> <!-- filter-group .// --> --}}






           @php
           $type=DB::table('products')->groupBy('recipt')->select('recipt')->get();
       @endphp
               <article class="filter-group">
                   <h6 class="title">
                       <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_3"> Recipient </a>
                   </h6>
                   <div class="filter-content collapse show" id="collapse_3">
                       <div class="inner">
                           @foreach ($type as $item)
                               
                           <label class="custom-control custom-checkbox">
                             <input type="checkbox"  class="custom-control-input selector recipt" value="{{ $item->recipt }}">
                             <div class="custom-control-label">{{ $item->recipt }}  
                               @php
                                   $total=DB::table('products')->where('recipt',$item->recipt)->where('status',1)->get();
                               @endphp
                                 <b class="badge badge-pill badge-light float-right">{{ count($total) }}</b>  </div>
                           </label>
                           @endforeach
       
                           
                       </div> <!-- inner.// -->
                   </div>
               </article> <!-- filter-group .// -->


       {{-- Shop--}}
       @php
                 $address=DB::table('shops')->groupBy('address')->select('address')->get();

   @endphp
           <article class="filter-group">
               <h6 class="title">
                   <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_2"> Address </a>
               </h6>
               <div class="filter-content collapse show" id="collapse_2">
                   <div class="inner">
                       @foreach ($address as $item)
                           
                       <label class="custom-control custom-checkbox">
                         <input type="checkbox"  class="custom-control-input selector address" value="{{ $item->address }}">
                         <div class="custom-control-label"> {{ $item->address }}</div>
                       </label>
                       @endforeach
   
                       
                   </div> <!-- inner.// -->
               </div>
           </article> <!-- filter-group .// -->

	</aside> <!-- col.// -->
	<main class="col-md-10">


<header class="mb-3">
		<div class="form-inline">
			<strong class="mr-md-auto pl-md-5"><span class="counts">{{ count($product) }}</span> Items found </strong>
			<select class="mr-2 form-control" id="sort">
				<option value="1">sort by new first</option>
				<option value="2"> sort by old first</option>
				<option value="3">sort by A to Z</option>
				<option value="4">sort by Z to A</option>
			</select>
			
		</div>
</header><!-- sect-heading -->
<div class="row row-sm product_grid">
    @foreach ($product as $item)
        
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
            <a href="{{ route('product',['id'=>$item->id,'name'=>$item->name]) }}" class="img-wrap"> <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"> </a>
            <figcaption class="info-wrap ">
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
                <div class="price mt-1">{{ __getPriceunit()}} {{number_format($item->price_after_comission) }}</div> <!-- price-wrap.// -->
            </figcaption>
        </div>
    </div> <!-- col.// -->
    @endforeach
 <div class="col-md-4 offset-md-4">
    <center>
        {{-- {{ $product->links()}} --}}
    </center>
 </div>
</div> <!-- row.// -->



	</main> <!-- col.// -->

</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function() {
	  $('#sort').on('change',function(){//onchange
	  var value=$(this).val();
  
  product_filter();
	});
	  $( "#mySlider" ).slider({//price range slider
	  range: true,
	  min: 0,
	  max: 25000,
	  values: [ 0, 25000 ],
	  step:50,
	  stop: function( event, ui ) {
  $( "#price" ).val( "Rs. " + ui.values[ 0 ] + " - Rs. " + ui.values[ 1 ] );
  $( "#hidden_max" ).val(ui.values[ 1 ]);
  $( "#hidden_min" ).val(ui.values[ 0 ]);

  
  }
  
  });
  $('#apply').click(function(){
    product_filter();
  })
  $( "#price" ).val( "Rs. " + $( "#mySlider" ).slider( "values", 0 ) +
		   " - Rs. " + $( "#mySlider" ).slider( "values", 1 ) );
	  //function filter data
	  function product_filter(){
  let order=$('#sort').val();
  let category=get_category('category');
  let brand=get_category('subcategory');
  let recipt=get_category('recipt');
  let address=get_category('address');


  let min=$( "#hidden_min" ).val();
  let max=$( "#hidden_max" ).val();
  let _token   = $('meta[name="csrf-token"]').attr('content');
  
		$.ajax({//aax call
		url:'{{ url('filterproduct/ajax/')}}',
		type:"GET",
	  data:{min:min,max:max,category:category,brand:brand,address:address,recipt:recipt,order:order,_token:_token},
  beforeSend:function(){
  
	  $(".loading").css("display",'block');
  
  },
  dataType:"json",
  success:function(data){
  $('.product_grid').empty();
  
  console.log(data);
	$('.product_grid').append(data);
  },
  complete:function(){
			  $(".loading").css('display','none');
  }
  })
	  }
  //getting category/brand
  function get_category(class_name){
	let product=[];
	$('.'+class_name+':checked').each(function(){
  product.push($(this).val());
	})
	return product;
  }
  
	$('.selector').on("click",function(){
	  product_filter();
	})
  })
  </script>

@endpush