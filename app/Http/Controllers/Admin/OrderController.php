<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Room;

// use App\Models\Order;

class OrderController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file
    use status;

    public function index(Request $request)
    {
        
        if ($request->to==date('Y-m-d',strtotime(today()))) {
            $request->to=date('Y-m-d',strtotime(today()->addDay(1)));
        }
       $orders=DB::table('orders')->join('rooms','rooms.id','orders.room_id')->orderBy('id','desc')->select('rooms.name','rooms.type','orders.*')->get();
if (isset($request->to)) {
    $orders=DB::table('orders')->join('rooms','rooms.id','orders.room_id')->orderBy('id','desc')->select('rooms.name','rooms.type','orders.*')->whereBetween('orders.created_at',[$request->from,$request->to])->get();
}
       return view('admin.order.index',compact('orders'));
    }

    public function today()
    {
       $orders=DB::table('orders')->join('rooms','rooms.id','orders.room_id')->orderBy('id','desc')->select('rooms.name','rooms.type','orders.*')->whereDate('orders.created_at',today())->orderBy('id','desc')->get();
       return view('admin.order.today',compact('orders'));
    }

    public function create()
    {
       $menus=Menu::orderBy('id','desc')->get();
       return view('admin.cart.create',compact('menus'));
    }

// Stroing  sales cart item using ajax
    public function updateOrderStatus($ex,$paid,$discount=0,$order_id,$discount_type,$payment_type){
       
     
        try {
            //code...
        
         $order= Order::find($order_id);

         $damount=($order->actual_amount*$discount)/100;
         if ($discount_type==1) {
             $damount=$discount;
         }
         $order->paid=$paid;
         $order->exchange=$ex;
         $order->discount=$damount;
         $order->status=1;
         $order->payment_mode=$payment_type;
         $order->save();
       return 1;
         
        } catch (\Throwable $th) {
            return 0;

        }
    }

    public function show($id){
        $bill=Order::where('id',$id)->value('order_id');
        $order_detail=Order_detail::join('menus','menus.id','order_details.menu_id')->where('order_details.order_id',$id)->select('order_details.*','menus.name','menus.image')->get();
       return view('admin.order.show',compact('order_detail','bill'));


    }

    // destroy sales cart item 
    public function destroy($id){
      $cart=Cart::find($id);
       $cart->delete();
        return response()->json('Item Deleted');

    }


 public function chart(){
    return view('admin.order.chart');
    

  }

   


    public function status($id){
        $order=Order::find($id);
        $order->status=1;
        $order->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Order Served',
            
         );
         return redirect()->back()->with($notification);
      }
    


      public function invoice(){
          return view('admin.order.invoice');
      }




      public function itemsell(){
        $order_detail=DB::table('order_details')->groupBy('category_id')->select('category_id')->whereDate('created_at',today())->get();
       return view('admin.order.sellitem',compact('order_detail'));


    }


    public function itemsell_show($category_id){
        $order_detail=DB::table('order_details')->where('order_details.category_id',$category_id)->join('menus','menus.id','order_details.menu_id')->whereDate('order_details.created_at',today())->select('order_details.*','menus.name','menus.image')->get();
       return view('admin.order.sellitem_show',compact('order_detail'));


    }




    // Stroing  sales cart item using ajax
    public function store($room_id){
       
        $orders=DB::table('carts')->join('menus','carts.menu_id','menus.id')->select('carts.*','menus.price','menus.category_id')->where('room_id',$room_id)->get();
        $total=0;
        foreach ($orders as $value) {
            $total+=$value->qty*$value->price;
        }
        if(count($orders)<=0){
            $data=[
                'alert'=>0,
                'message'=>'No item in cart',

            ];
            return response()->json($data);

        }
        $recent_order=Order::orderBy('id','desc')->whereDate('created_at',today())->first();
        if ($recent_order) {
            $orderId=str_pad($recent_order->order_id + 1, 3, "0", STR_PAD_LEFT);
        }else{
            $orderId=str_pad(1, 3, "0", STR_PAD_LEFT);
        }
    
         $order=new Order;
         $order->paid=0;
         $order->actual_amount=$total;
         $order->exchange=0;
         $order->discount=0;
         $order->order_id=$orderId;
         $order->room_id=$room_id;
         $order->save();

        $order_id=$order->id;     
         foreach ($orders as  $order) {
             $sub=$order->price*$order->qty;
            $orderdetails=new Order_detail;
               $orderdetails->menu_id=$order->menu_id;
               $orderdetails->qty=$order->qty;
               $orderdetails->price=$order->price;
               $orderdetails->category_id=$order->category_id;
               $orderdetails->total=$sub;
              $orderdetails->order_id=$order_id;
              $orderdetails->save();
          }          
          DB::table('carts')->where('room_id',$room_id)->delete();
          $total=$total;
          $room=Room::find($room_id);
            $room->Isbooked==1;
            $room->save();
        return view('admin.order.invoice',compact('orderId','order_id','total'));
     
    }
}
