<?php

namespace App\Http\Controllers\Vendorpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Order;
use App\Models\order_detail;
use App\Models\shipping;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VendorOrderExport;
class OrderController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','orders.tracking_code','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->orderBy('id','desc')->get();
       return view('vendorpanel.order.all',compact('order'));
    }
    public function newOrder()
    {
        $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','orders.tracking_code','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',0)->orderBy('id','desc')->get();
       return view('vendorpanel.order.index',compact('order'));
    }

    public function processOrder()
    {
        $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','orders.tracking_code','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',1)->orderBy('id','desc')->get();
       return view('vendorpanel.order.process',compact('order'));
    }

    public function shippingOrder()
    {
        $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','orders.tracking_code','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',2)->orderBy('id','desc')->get();
        return view('vendorpanel.order.shipping',compact('order'));
    }

    public function deliverOrder()
    {
        $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','orders.tracking_code','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',3)->orderBy('id','desc')->get();
        return view('vendorpanel.order.deliver',compact('order'));

    }

    public function cancelOrder()
    {
        $order=DB::table('order_details')->join('orders','order_details.order_id','orders.id')->join('products','products.id','order_details.product_id')->select('order_details.*','orders.status','orders.tracking_code','products.name','products.image','products.id as pid')->where('order_details.vendor_id',Auth::user()->id)->where('orders.status',4)->orderBy('id','desc')->get();
        return view('vendorpanel.order.cancel',compact('order'));

    }

    public function changeOrderStatus($id,$hid)
    {
$order=Order::find($hid);
$order->status=$id;
$order->save();
     return response()->json('success');
    }


    public function show(Request $request){
        $id=$request->id;
        $product=DB::table('order_details')->join('products','products.id','order_details.product_id')->select('order_details.*','products.name','products.image')->where('order_details.vendor_id',Auth::user()->id)->where('order_details.id',$id)->orderBy('id','desc')->get();
    return view('vendorpanel.order.show',compact('product'));
    }




    public function filter(Request $request){
        $id=Auth::user()->id;

        $data="SELECT order_details.*,orders.status,products.name,products.image,orders.tracking_code FROM order_details JOIN orders ON orders.id=order_details.order_id JOIN products ON products.id=order_details.product_id WHERE order_details.vendor_id = $id ";
    
        if(isset($request->vendor) && !empty($request->vendor)){
            $data .="  AND order_details.qty = '$request->vendor' ";
        }
      
         if(isset($request->status) && !empty($request->status)){
            $data .="  AND orders.status = $request->status ";
        }
       
      
        if(isset($request->to) && !empty($request->to) ||isset($request->from) && !empty($request->from)){
            $data .=" AND   order_details.created_at BETWEEN '$request->from' AND '$request->to'";
        }
        
      
        $vendor=DB::select($data);
      
      $jsondata= "";
    
      $i=1;
      $total=0;

      foreach ($vendor as $item){
        
            $total+=$item->qty*$item->price;

      $jsondata.="
      <tr>
      <td>".$i++."</td>
      <td>$item->tracking_code</td>

      <td><img src='".asset($item->image)."'  width='60'></td>
      <td>$item->name
      <p class='py-0 my-0'>color:<span style='width:50px;height:20px;background: $item->color ;padding:3px 5px;color:#fff;'>$item->color </span></p>  <p class='py-0 my-0'>Size: $item->size</p>
 </td>
      
      
      <td>";
       if($item->coupon){
        
        $jsondata.="<div class='row'>
            <div class='col-md-8'>
         
         
             <p class='py-0 my-0'>Actual price:</p>
            <p class='py-0 my-0'> Coupon($item->coupon)</p>
            <p class='py-0 my-0'> Price after coupon</p>

            </div>
            <div class='col-md-4'>
             <p class='py-0 my-0'><b>$item->actual_price</b></p>
             
                <p class='py-0 my-0'><b>$item->coupon_value</b> %</p>

             <b>".number_format($item->price)."</b>

            </div>
        </div>";}
        else{
        $jsondata.="<div class='row'>
         <div class='col-md-8'>
      
      
          <p class='py-0 my-0'>Actual price:</p>
         

         </div>
         <div class='col-md-4'>
          <p class='py-0 my-0'><b>$item->actual_price</b></p>

         </div>
     </div>     ";     

      }
      
      $jsondata.="</td>
      <td>$item->qty</td>
      <td>$total</td><td>";

     



if($item->status==0){
    $jsondata.="  <span class='badge text-white bg-danger'>
    Pending                   
</span> ";


}

if($item->status==1){
    $jsondata.="  <span class='badge text-white bg-info'>
    Proccessing                   
</span> ";


}
if($item->status==2){
    $jsondata.="  <span class='badge text-white bg-primary'>
    Proccessing                   
</span> ";


}
if($item->status==3){
    $jsondata.="  <span class='badge text-white bg-success'>
    Delivered                   
</span> ";


}
if($item->status==4){
    $jsondata.="  <span class='badge text-white bg-danger'>
    Cancelled                   
</span> ";


}

$jsondata.=" </td><td>$item->created_at</td>
     
  </tr>";
    
      }
      
      
        return response()->json($jsondata);
      
    }
    

    public function export(Request $request) 
    {
        return Excel::download(new VendorOrderExport($request->all()) , 'order.xlsx');
    }


}
