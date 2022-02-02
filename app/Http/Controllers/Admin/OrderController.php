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

// use App\Models\Order;

class OrderController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file
    use status;

    public function index()
    {
       $orders=DB::table('orders')->orderBy('id','desc')->get();
       return view('admin.order.index',compact('orders'));
    }

    public function today()
    {
       $orders=DB::table('orders')->whereDate('created_at',today())->orderBy('id','desc')->get();
       return view('admin.order.today',compact('orders'));
    }

    public function create()
    {
       $menus=Menu::orderBy('id','desc')->get();
       return view('admin.cart.create',compact('menus'));
    }


// Stroing  sales cart item using ajax
    public function store(Request $request,$ex,$paid,$discount=0){
       
        $orders=DB::table('carts')->join('menus','carts.menu_id','menus.id')->select('carts.*','menus.price')->get();
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
        $orderId=1235;
         $order=new Order;
         $order->paid=$paid;
         $order->actual_amount=$total;
         $order->exchange=$ex;
         $order->discount=$discount;
         $order->order_id=$orderId;
         $order->save();

                
         foreach ($orders as  $order) {
            $order_detail=new Order_detail;
               $order_detail->menu_id=$order->menu_id;
               $order_detail->qty=$order->qty;
               $order_detail->price=$order->price;
                        $order_detail->order_id=$orderId;
              $order_detail->save();

          }
          
          
       DB::table('carts')->delete();
       $data=[
        'alert'=>1,
        'message'=>'Bill printed',

    ];

        return response()->json($data);
     
    }

    public function show($id){

        $order_detail=Order_detail::join('menus','menus.id','order_details.menu_id')->where('order_id',$id)->select('order_details.*','menus.name','menus.image')->get();
       return view('admin.order.show',compact('order_detail','id'));


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

    public function filter(Request $request)
    {
        $select=" ";
        if (isset($request->from)&&!empty($request->from)&&isset($request->to)&&!empty($request->to)) {
            $select.= " SELECT * FROM orders WHERE `created_at` BETWEEN '$request->from' AND '$request->to'";
        }
        $orders=DB::select($select);
       return view('admin.order.index',compact('orders'));
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
    


      public function invoice(){
          return view('admin.order.invoice');
      }
}
