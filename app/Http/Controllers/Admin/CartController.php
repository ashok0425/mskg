<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Menu;

// use App\Models\Order;

class CartController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file
    use status;

    public function index()
    {
       $carts=DB::table('carts')->join('menus','menus.id','carts.menu_id')->select('carts.*','menus.price','menus.price','menus.name')->get();
       return view('admin.cart.index',compact('carts'));
    }


    public function create()
    {
       $menus=Menu::orderBy('id','desc')->get();
       return view('admin.cart.create',compact('menus'));
    }


// Stroing  sales cart item using ajax
    public function store(Request $request,$id,$qty){
       
        $precart=Cart::where('menu_id',$id)->first();
        if($precart){
            $data=[
                'alert'=>0,
                'message'=>'Item Already exist in bill.',

            ];
            return response()->json($data);

        }else{
            $cart=new Cart;
            $cart->menu_id=$id;
            $cart->qty=$qty;
            $cart->save();
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




}
