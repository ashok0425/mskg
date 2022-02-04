<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_detail;

// use App\Models\Order;

class OrderController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file
    use status;

    public function index()
    {
       $orders=Order::where('status',0)->whereDate('created_at',today())->orderBy('created_at','desc')->get();
      

       return view('kitchen.order.partial',compact('orders'));
    }

   public function Emptypage(){
      return view('kitchen.order.index');

   }

    public function status($id){
        $order=Order_detail::find($id);
        $order->status=1;
        $order->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Order Served',
            
         );
         return redirect()->back()->with($notification);
      }
    


}
