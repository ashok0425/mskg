<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Website;
use App\Models\order_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\checkout;
use Illuminate\Support\Facades\Mail;

class CheckoutController  extends Controller
{
    

  public function store(Request $request)
  {
    $request->validate([
      'fname'=>'required',
      'lname'=>'required',
      'email'=>'required|email',
      'zip'=>'required',
      'state'=>'required',
      'city'=>'required',
      'phone'=>'required',



    ]);
      if(Auth::check()){
        if($request->buynow==1){
          $cart = DB::table('carts')->where('user_id',Auth::user()->id)->where('buynow',1)->get();

        }else{
          $cart = DB::table('carts')->where('user_id',Auth::user()->id)->where('buynow','!=',1)->get();


        }
          if(count($cart)<=0){

         return redirect()->route('/');
          }
      if ($request->payment == 'esewa') {//proceed to payment if payment method is paypal
        try {
        
         $data=new Order;
          $data->user_id = Auth::user()->id;
          $data->total = $request->total;          
          $data->shipping_charge = $request->charge;
          $data->tax = $request->vat;
          $data->payment_type = $request->payment;
          $data->tracking_code =  uniqid();
          $data->cart_value = $request->cart;
          $data->coupon = $request->coupon;
          $data->coupon_value = $request->coupon_value;

          
          $data->status = 0;    
        $data->save();
        $order_id=$data->id;
          /// Insert Shipping Table 
          $shipping = array();
          $shipping['order_id'] = $order_id;
          // $shipping['vendor_id'] = $request->Auth::user()->id;
          $shipping['name'] = $request->fname;
          $shipping['email'] = $request->email;
          $shipping['phone'] = $request->phone;
          $shipping['state'] = $request->state;
          $shipping['city'] = $request->city;
          $shipping['zip'] = $request->zip;

      
          DB::table('shippings')->insert($shipping);
      
          $content =  DB::table('products')->join('categories','categories.id','products.category_id')->join('subcategories','subcategories.id','products.category_id')->join('carts','carts.pid','products.id')->select('products.name','products.image','categories.category','subcategories.subcategory','carts.*')->where('carts.uid',Auth::user()->id)->get();
// inserting all cart item 
          foreach ($content as $row) {
            $details=new order_detail;
          $details['order_id'] = $order_id;
          $details['name'] = $row->name;
          $details['image'] = $row->image;  
          $details['category'] = $row->category;
          $details['subcategory'] = $row->subcategory;
          $details['color'] = $row->color;
          $details['size'] = $row->size;
          $details['qty'] = $row->qty;
          $details['price'] = $row->price;
          $details['uid'] = uniqid();

          DB::table('order_details')->insert($details); 
      
          }
          return redirect()->route('paypal.checkout',['order'=>$order_id]);
  }
  catch (\Throwable $th) {
    $notification=array(
      'messege'=>'Something went wrong. Please try again later..',
      'alert-type'=>'error'
       );
  return redirect()->route('payment.error')->with($notification);
  }

}

else{
// try {
    $data=new Order;
    $data->user_id = Auth::user()->id;
    $data->total = $request->total;          
    $data->shipping_charge = $request->charge;
    $data->tax = $request->vat;
    $data->payment_id = rand();
    $data->payment_type =$request->payment;
    $data->tracking_code =  uniqid();

    $data->cart_value = $request->cart_value;
    $data->coupon = $request->coupon;
    $data->coupon_value = $request->coupon_value;
    $data->status = 0;    
  $data->save();
  $order_id=$data->id;
    /// Insert Shipping Table 
    $shipping = array();
    $shipping['order_id'] = $order_id;
    // $shipping['vendor_id'] = $request->Auth::user()->id;
    $shipping['name'] = $request->fname.' '.$request->lname;
    $shipping['email'] = $request->email;
    $shipping['phone'] = $request->phone;
    $shipping['state'] = $request->state;
    $shipping['city'] = $request->city;

    $shipping['zip'] = $request->zip;


    DB::table('shippings')->insert($shipping);

 

    if($request->buynow==1){
      $content =  DB::table('carts')->join('products','products.id','carts.product_id')->select('carts.*','products.price as Pprice','products.comission','products.vendor_id')->where('carts.user_id',Auth::user()->id)->where('carts.buynow',1)->get();
    }else{
      $content =  DB::table('carts')->join('products','products.id','carts.product_id')->select('carts.*','products.price as Pprice','products.comission','products.vendor_id')->where('carts.user_id',Auth::user()->id)->where('carts.buynow','!=',1)->get();

    }
// inserting all cart item 
   
    foreach ($content as $row) {
      $details=new order_detail;
    $details->order_id = $order_id;
    $details->product_id = $row->product_id;
    $details->vendor_id = $row->vendor_id;

    $details->color = $row->color;
    $details->size = $row->size;
    $details->qty = $row->qty;
    if($row->coupon!=''){
      $details->price_after_comission = $row->price;

    }else{
    $details->price_after_comission = $row->price_after_comission;

    }
    $details->coupon = $row->coupon;
    $details->coupon_value = $row->coupon_value;
 
    $details->price_after_coupon = $row->price;
    if($row->coupon!=''){
      $details->price = $row->actual_price-($row->actual_price*$row->coupon_value/100);

    }else{
    $details->price = $row->actual_price;

    }
    $details->actual_price = $row->actual_price;

    $details['uid'] = uniqid();
    $details->comission = $row->comission;

$details->save();

    }
    if (Session::has('vendorcoupon')) {
      Session::forget('vendorcoupon');
    
    }
    // return redirect()->route('payment.success',['orderid'=>$data->tracking_code]);

// sending email 
$data=DB::table('websites')->first();
$order=DB::table('orders')->where('user_id',Auth::user()->id)->where('id',$order_id )->first();
$ship=DB::table('shippings')->where('order_id',$order_id)->first();
  if($request->buynow==1){

$cart = DB::table('products')->join('carts','carts.product_id','products.id')->select('products.name','products.image','carts.*')->where('user_id',Auth::user()->id)->where('buynow',1)->get();
      
  }
else{
    
    $cart = DB::table('products')->join('carts','carts.product_id','products.id')->select('products.name','products.image','carts.*')->where('user_id',Auth::user()->id)->where('buynow','!=',1)->get();
}
$set=[
    'image'=>$data->image,
    'cart'=>$cart,
    'address'=>$data->address1,
    'phone'=>$data->phone1,
    'email'=>$data->email1,

    'ship_email'=>$ship->email,
    'ship_name'=>$ship->name,
    'ship_phone'=>$ship->phone,
    'ship_address'=>$ship->state,
    'ship_city'=>$ship->city,
    'ship_zip'=>$ship->zip,
    'order_number'=>$order->tracking_code,
    'coupon'=>$order->coupon,
    'coupon_value'=>$order->coupon_value,
    'cart_value'=>$order->cart_value,
    'tax'=>$order->tax,
    'shipping'=>$order->shipping_charge,
    'order_id'=>$order->tracking_code,
    'total'=>$order->total,

    'payment_type'=>$order->payment_type,
    'order_date'=>$order->created_at,



];

$pdf = PDF::loadView('mail.checkout', $set);
Mail::send('mail.order', $set, function($message)use($set, $pdf) {
    $message->to($set['ship_email'])
            ->subject('Order Invoice Mail')
            ->attachData($pdf->output(), "orderinvoice.pdf");
});
Mail::send('mail.order', $set, function($message)use($set, $pdf) {
    $message->to('krafftboxnp@gmail.com')
            ->subject('Order Invoice Mail')
            ->attachData($pdf->output(), "orderinvoice.pdf");
});
if($request->buynow==1){
  $cart = DB::table('carts')->where('user_id',Auth::user()->id)->where('buynow',1)->delete();

}else{
  $cart = DB::table('carts')->where('user_id',Auth::user()->id)->where('buynow','!=',1)->delete();


}
if (Session::has('coupon')) {
    Session::forget('coupon');

}
if (Session::has('vendorcoupon')) {
  Session::forget('vendorcoupon');

}

return redirect()->route('payment.success',['orderid'=>$order->tracking_code]);

//   }

//  catch (\Throwable $th) {
//   $notification=array(
//     'messege'=>'Something went wrong. Please try again later..',
//     'alert-type'=>'error'
//      );
// return redirect()->route('payment.error')->with($notification);
// }
}

}else{
$notification=array(
  'messege'=>'Please login first !',
  'alert-type'=>'error'
   );
return redirect()->route('login')->with($notification);
}
}





    public function index(){
        if(Auth::check()){
  
        return view('frontend.checkout');
      }else{
        return redirect()->route('login');
  
      }
      }

      public function failed(){
        if(Auth::check()){
  
        return view('errors.paymentfailed');
      }else{
        return redirect()->route('login');
  
      }
      }

      public function success($orderid){
        if(Auth::check()){
  $orderid=$orderid;
        return view('errors.success',compact('orderid'));
      }else{
        return redirect()->route('login');
  
      }
      }

}

