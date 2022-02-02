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
      $order_detail=Order_detail::join('menus','menus.id','order_details.menu_id')->where('order_details.status',0)->whereDate('order_details.created_at',today())->select('order_details.*','menus.name','menus.image')->get();

       return view('kitchen.order.partial',compact('order_detail'));
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
