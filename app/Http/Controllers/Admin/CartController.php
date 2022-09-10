<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Room;

// use App\Models\Order;

class CartController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file
    use status;

    public function index()
    {
       $rooms=Room::all();
       return view('admin.cart.index',compact('rooms'));
    }


    public function create()
    {
       $menus=Menu::orderBy('id','desc')->get();
       return view('admin.cart.create',compact('menus'));
    }


// Stroing  sales cart item using ajax
    public function store(Request $request,$id,$qty,$room_id){
       
        $precart=Cart::where('menu_id',$id)->where('room_id',$room_id)->first();
      
        if($precart){
            $precart->qty=$precart->qty+$qty;
            $precart->save();
            $data=[
                'alert'=>1,
                'message'=>'Item Updated.',

            ];
            return response()->json($data);

        }else{
            $cart=new Cart;
            $cart->menu_id=$id;
            $cart->qty=$qty;
            $cart->room_id=$room_id;
            $cart->save();  
            $room=Room::find($room_id);
            $room->Isbooked=1;
            $room->save();        
            $data=[
                'alert'=>1,
                'message'=>'Item Added to bill.',

            ];

        

            return response()->json($data);


        }
     
    }


    // destroy sales cart item 
    public function destroy($id){
      $cart=Cart::find($id);
       $cart->delete();
        return response()->json('Item Deleted');

    }


function print($room_id){
  return view('admin.cart.print',compact('room_id'));
}

function updateIsprint($room_id){
    DB::table('carts')->where('room_id',$room_id)->update(['isprint'=>1]);
}
function verify_security($security_code){
    $code=  DB::table('security_code')->where('id',1)->value('code');
   if($security_code==$code){
    session()->put('security_code',1);
    return response(1);
   }else{
    return response(0);

   }
}

}
