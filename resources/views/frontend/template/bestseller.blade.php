
<!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">
    @php
        $product=DB::table('order_details')->join('products','products.id','order_details.product_id')->select('products.*')->orderBy('order_details.id','desc')->DISTINCT('products.name')->limit(18)->get();
    @endphp
        <header class="section-heading heading-line">
            <h4 class="title-section text-uppercase">BESTSELLER ITEMS</h4>
        </header>
        
        <div class="row px-0 mx-0">
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