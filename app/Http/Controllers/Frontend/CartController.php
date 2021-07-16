<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Productvariation;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Website;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
class CartController  extends Controller
{

    public function store(Request $request){
       $request->validate([
           'product_id'=>'required'
       ]);
      
     if(Auth::check()){

  if($request->submit=='Add to Cart'){
    try {
          //checking whether same product is already store in cart or not
      $check=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('buynow','!=',1)->first();
      if($check){
          $notification=array(
          'alert-type'=>'info',
          'messege'=>'Item already in your cart',
         
       );
       return redirect()->back()->with($notification);
      
      }
       else{
  $cart=new Cart;
          //checking whether the selected product have attribute or not

    $color=ProductColor::find($request->color);
    $size=Productvariation::find($request->storage);
    $product=Product::find($request->product_id);

        if(isset($request->color)){
          $cart->color=$color->color;
        }
        if(isset($request->storage)){
          $cart->size=$size->variation;
          $cart->price_after_comission=$size->price_after_comission;
          $cart->actual_price=$size->price;

     
        }else{
          $cart->price_after_comission=$product->price_after_comission;
          $cart->actual_price=$product->price;

        }
        
            $cart->product_id=$request->product_id;
            $cart->user_id=Auth::user()->id;
            $cart->price=$request->price;
        
            $cart->qty=$request->qty;
            if(session::has('vendorcoupon')){
            $cart->coupon=session()->get('vendorcoupon')['name'];
            $cart->coupon_value=session()->get('vendorcoupon')['discount'];

              
            
             }

        if($cart->save()){
          if(session::has('vendorcoupon')){
            session::forget('vendorcoupon');
          
           }
          $notification=array(
                'alert-type'=>'success',
                'messege'=>'Item added to your cart',
              
            );
         return redirect()->back()->with($notification);
     }else{
       $notification=array(
            'alert-type'=>'info',
            'messege'=>'Something went wrong. Please try again later.',
           
         );
         return redirect()->back()->with($notification);
     }
    }

  }catch (\Throwable $th) {
      $notification=array(
          'alert-type'=>'error',
          'messege'=>'Something went wrong please try again later.',
         
       );
       return redirect()->back()->with($notification);
      }

}

else{
  // try {
    //checking whether same product is already store in cart or not
$check=DB::table('carts')->where('user_id',Auth::user()->id)->where('buynow',1)->delete();
$cart=new Cart;
    //checking whether the selected product have attribute or not

$color=ProductColor::find($request->color);
$size=Productvariation::find($request->storage);
$product=Product::find($request->product_id);
$cart->buynow=1;

  if(isset($request->color)){
    $cart->color=$color->color;
  }
  if(isset($request->storage)){
    $cart->size=$size->variation;
    $cart->price_after_comission=$size->price_after_comission;
    $cart->actual_price=$size->price;


  }else{
    $cart->price_after_comission=$product->price_after_comission;
    $cart->actual_price=$product->price;

  }
  
      $cart->product_id=$request->product_id;
      $cart->user_id=Auth::user()->id;
      $cart->price=$request->price;
  
      $cart->qty=$request->qty;
      if(session::has('vendorcoupon')){
      $cart->coupon=session()->get('vendorcoupon')['name'];
      $cart->coupon_value=session()->get('vendorcoupon')['discount'];

        
      
       }

  if($cart->save()){
    if(session::has('vendorcoupon')){
      session::forget('vendorcoupon');
    
     }
   
   return redirect()->route('buynow');
}else{
 $notification=array(
      'alert-type'=>'info',
      'messege'=>'Something went wrong. Please try again later.',
     
   );
   return redirect()->back()->with($notification);
}

// }catch (\Throwable $th) {
// $notification=array(
//     'alert-type'=>'error',
//     'messege'=>'Something went wrong please try again later.',
   
//  );
 return redirect()->back()->with($notification);
}

    
}
     
  else{
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Please login.',
           
         );
         return redirect()->back()->with($notification);
       }
    



    }




public function buynow(){
  return view('frontend.buynow');
}


    public function vendorCoupon(Request $request){
      
        $coupon = $request->coupon;
        if(session()->has('vendorcoupon')){
      Session::forget('vendorcoupon');
         
        }

     $check = DB::table('vendorcoupons')->where('coupon',$coupon)->where('Isapproved',1)->where('vendor_id',$request->vendor_id)->where('status',1)->first();
    
     

     if ($check) {

     if($check->expire_at>today()){

     Session::put('vendorcoupon',[
     'name' => $check->coupon,
     'discount' => $check->price,
     'vendor_id' => $request->vendor_id,
     'product_id' => $request->product_id,
    
     ]);
         $notification=array(
                         'messege'=>'Coupon Code applied successfully!',
                         'alert-type'=>'success'
                          );
                        return Redirect()->back()->with($notification);
 

 
     }else{
        
       
       $notification=array(
           'messege'=>'Sorry, your coupon hasbeen expired',
           'alert-type'=>'error'
            );
          return Redirect()->back()->with($notification);
     }
   
   
   }

     else{
         $notification=array(
                         'messege'=>'Coupon hasn\'t been Approved',
                         'alert-type'=>'error'
                          );
                        return Redirect()->back()->with($notification);
     }
 
    }



    public function vendorCouponRemove(){
 if(session::has('vendorcoupon')){
  Session::forget('vendorcoupon');

 }
      $notification=array(
                         'messege'=>'Coupon Code removed successfully!',
                         'alert-type'=>'success'
                          );
     return Redirect()->back()->with($notification);
 
  }




    public function index(){
        if(Auth::check()){
  
          $cart = DB::table('carts')->join('products','carts.product_id','products.id')->select('carts.*','products.name','products.image','products.id as pid')->where('carts.user_id',Auth::user()->id)->where('buynow','!=',1)->get();
        return view('frontend.cart',compact('cart'));
      }else{
        return redirect()->route('login');
  
      }
      }



      public function destroy($id){
    
        $cart = DB::table('carts')->where('user_id',Auth::user()->id)->where('id',$id)->delete();
        
          $notification=array(
                          'messege'=>'Item removed from your cart',
                          'alert-type'=>'success'
                           );
                         return Redirect()->back()->with($notification);
  
      }
  
  
      public function update(Request $request,$val,$id,$price){
         if(session()->has('coupon')){
          Session::forget('coupon');

         }
           DB::table('carts')->where('user_id',Auth::user()->id)->where('id',$id)->update([
               'qty'=>$val
           ]);
           $total=$price*$val;
           $cart_total=0;
           $cart=DB::table('carts')->where('user_id',Auth::user()->id)->get();
           foreach($cart as $item){
            $cart_total+=$item->qty*$item->price;

           }
           $vat=Website::find(1);
           $grandtotal=___getPriceafterVat($cart_total,$vat->tax,$vat->shipping_charge);
           $data=[
             'total'=>$total,
             'carttotal'=>number_format((float)$cart_total,2),
             'grandtotal'=>number_format((float)$grandtotal,2)
           ];
        return response()->json($data);

    
      }
  
  
  
  
  
  
  
     public function Checkout(){
    if (Auth::check()) {
        $cart = DB::table('carts')->join('products','carts.pid','products.id')->select('carts.*','products.name','products.image','products.id as pid','products.price_after_comission')->where('carts.uid',Auth::user()->id)->get();
      if(count($cart)>0){
          return view('frontend.checkout',compact('cart'));
        
      }else{
        $notification=array(
          'messege'=>"You don't have any item in cart",
          'alert-type'=>'error'
           );
         return Redirect()->route('/')->with($notification);
      }
  
    }else{
        $notification=array(
                          'messege'=>'Please Login First !',
                          'alert-type'=>'error'
                           );
                         return Redirect()->route('login')->with($notification);
    } 
  
     }
  
  
     
  
     public function Coupon(Request $request){
         $coupon = $request->coupon;
  
      $check = DB::table('coupons')->where('coupon',$coupon)->first();

      $cart = DB::table('carts')->where('user_id',Auth::user()->id)->get();

      $grandtotal=0;
  foreach ($cart as $value) {
    $grandtotal+=$value->qty*$value->price;
  }

      if ($check) {

      if($check->expire_at>today()){
        $discount_amount=($check->price*$grandtotal)/100;
if($grandtotal>$check->card_value){

      Session::put('coupon',[
      'name' => $check->coupon,
      'discount' => $check->price,
      'balance' => $grandtotal-$discount_amount,
      ]);
          $notification=array(
                          'messege'=>'Coupon Code applied successfully!',
                          'alert-type'=>'success'
                           );
                         return Redirect()->back()->with($notification);
  
}else{
    $notification=array(
        'messege'=>"You arenot eligible to apply this coupon.Your cart value must be more than $ $check->card_value",
        'alert-type'=>'error'
         );
       return Redirect()->back()->with($notification);
}
  
      }else{
         
        
        $notification=array(
            'messege'=>'Sorry you coupon hasbeen expired',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
      }
    
    
    }

      else{
          $notification=array(
                          'messege'=>'Invalid Coupon',
                          'alert-type'=>'error'
                           );
                         return Redirect()->back()->with($notification);
      }
  
     }
  
  
   public function CouponRemove(){
       Session::forget('coupon');
       $notification=array(
                          'messege'=>'Coupon Code removed successfully!',
                          'alert-type'=>'success'
                           );
                         return Redirect()->back()->with($notification);
  
   }
  
  
  
   public function PaymentPage(){
   
    $cart = DB::table('carts')->where('uid',Auth::user()->id)->get();
  if(count($cart)>0){
    return view('frontend.payment',compact('cart'));
  
  }else{
    return redirect()->route('/');
  
  }
  
   }
  
  
   public function Search(Request $request){
   
    $item = $request->search;
    // echo "$item";
  
    $products = DB::table('products')
              ->where('product_name','LIKE',"%$item%")
              ->paginate(20);
  
      return view('pages.search',compact('products'));        
  
  
   }




}

