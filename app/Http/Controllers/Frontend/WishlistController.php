<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Productvariation;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
class WishlistController  extends Controller
{
    

    public function store(Request $request,$id){
  
      try {
          //checking whether same product is already store in cart or not
       if(Auth::check()){
        $check=DB::table('wishlists')->where('user_id',Auth::user()->id)->where('product_id',$id)->first();
        if($check){
       
          DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$id)->delete();
       $notification=array(
            'alert-type'=>'info',
            'messege'=>'Product already exist in your wishlist',
           
         );
         return redirect()->back()->with($notification);
}else{
  $wish=new Wishlist;
   $wish->product_id=$id;
   $wish->user_id=Auth::user()->id;


        if($wish->save()){
          DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$id)->delete();
          $notification=array(
                'alert-type'=>'success',
                'messege'=>'Item added to your wishlist',
              
            );
         return redirect()->back()->with($notification);
     }else{
       $notification=array(
            'alert-type'=>'info',
            'messege'=>'Something went wrong.please try again',
           
         );
         return redirect()->back()->with($notification);
     }
}
  }else{
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Please login.',
           
         );
         return redirect()->back()->with($notification);
       }
      }

catch (\Throwable $th) {
    $notification=array(
        'alert-type'=>'error',
        'messege'=>'Something went wrong please try again later.',
       
     );
     return redirect()->back()->with($notification);
    }
    }



    


    public function index(){
        if(Auth::check()){
  
          $wish = DB::table('wishlists')->join('products','wishlists.product_id','products.id')->select('wishlists.*','products.name','products.image','products.id as pid','products.price_after_comission')->where('wishlists.user_id',Auth::user()->id)->get();
        return view('frontend.wishlist',compact('wish'));
      }else{
        return redirect()->route('login');
  
      }
      }



      public function destroy($id){
    


        $cart = DB::table('wishlists')->where('user_id',Auth::user()->id)->where('id',$id)->delete();
        
          $notification=array(
                          'messege'=>'Item removed from your wishlist',
                          'alert-type'=>'success'
                           );
                         return Redirect()->back()->with($notification);
  
      }

  public function cart(Request $request,$id){
     
    $check=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$id)->first();
if($check){
$wish= DB::table('wishlists')->where('user_id',Auth::user()->id)->where('product_id',$id)->delete();
  $notification=array(
    'messege'=>'Item added to your cart',
    'alert-type'=>'success'
     );
   return Redirect()->back()->with($notification);
}else{

      $price=DB::table('products')->where('id',$id)->first();
      $cart=new Cart;
      $cart->user_id=Auth::user()->id;
      $cart->product_id=$id;
      $cart->price=$price->price_after_comission;
      $cart->price_after_comission=$price->price_after_comission;
      $cart->actual_price=$price->price;
      $cart->qty=1;

      if($cart->save()){
        $cart = DB::table('wishlists')->where('user_id',Auth::user()->id)->where('product_id',$id)->delete();
        $notification=array(
          'messege'=>'Product added to cart',
          'alert-type'=>'success'
           );
         return Redirect()->back()->with($notification);
      }
    }


  }
      


}

