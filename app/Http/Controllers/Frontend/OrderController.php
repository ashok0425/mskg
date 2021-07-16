<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\checkoutmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Cart;
use GuzzleHttp\Middleware;
use App\Models\Order;
use App\Models\order_detail;
use App\Models\shipping;
class OrderController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $order = DB::table('orders')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
            return view('frontend.order',compact('order'));
        }else{
            $notification=array(
                'messege'=>'Please login first !',
                'alert-type'=>'error'
                 );
            return redirect()->route('login')->with($notification);
        }
    }






    public function show($id){
if(Auth::check()){
    try {
        //code...
                $order=Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
if(!$order){
    $notification=array(
        'messege'=>'Sorry,Invalid Order Id',
        'alert-type'=>'error'
         );
    return redirect()->route('/')->with($notification);
}
                $shipping=shipping::where('order_id',$id)->first();
                $product=DB::table('order_details')->join('products','products.id','order_details.product_id')->select('order_details.*','products.name','products.image',)->where('order_details.order_id',$id)->get();
                

                return view('frontend.vieworder',compact('order','shipping','product'));
    
            } catch (\Throwable $th) {
                

                $notification=array(
                    'messege'=>'Something went wrong. Please try again later.',
                    'alert-type'=>'error'
                     );
                return redirect()->back()->with($notification);

            }
            	
    
        }
    
    
    }
 
 
    public function orderTrack(Request $request)
    {

        $track=DB::table('orders')->where('tracking_code',$request->code)->first();
        if($track){
            return view('frontend.trackorder',compact('track'));

        }else{
            $notification=array(
                'messege'=>'Please insert valid order status key',
                'alert-type'=>'error'
                 );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuccessList($id){

        $row = DB::table('orders')->where('user_id',Auth::id())->where('id',$id)->first();
        return view('frontend.returnorder',compact('row'));
      
      
        }
        
        public function returnRequest(Request $request,$id){

            $row = DB::table('orders')->where('user_id',Auth::id())->where('status_code',$id)->update(['return_id'=>1]);
            $row = DB::table('return')->insert(['user_id'=>Auth::user()->id,'order_id'=>$id,'message'=>$request->return]);
            $notification=array(
                'messege'=>'Return order request send',
                'alert-type'=>'success'
                 );
               return Redirect()->route('/')->with($notification);
          
          
            } 





            
}
