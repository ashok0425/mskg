<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Ticket;

use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Vendortotal;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentExport;
class PaymentController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
   
    public function index()
    {
        $payment=DB::table('payments')->join('users','users.id','payments.vendor_id')->orderBy('payments.id','desc')->select('payments.*','users.name','users.id as vid')->get();
       return view('backend.payment.index',compact('payment'));
    }

    public function vendorTotal()
    {
        $payment=DB::table('vendortotals')->join('users','users.id','vendortotals.vendor_id')->select('vendortotals.*','users.name','users.id as vid')->orderBy('vendortotals.id','desc')->get();
       return view('backend.payment.vendorpayment',compact('payment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.payment.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required|',
            'vendor'=>'required',
            'payment_mode'=>'required',

   
        ]);
        // try {
 
            $category=new Payment;
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'payment.'.$file->getClientOriginalExtension();
                $category->image='upload/payment/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/payment/',$fname);
            }
            $category->vendor_id=$request->vendor;
            $category->amount=$request->amount;
            $category->date=date('Y-m-d');
            $category->time=now();
            $category->payment_id=uniqid();
            $category->payment_mode=$request->payment_mode;
            if($category->save()){
                $total=Vendortotal::where('vendor_id',$request->vendor)->first();
                if($total){
                    $total->date=date('Y-m-d');
                    $total->total=$request->amount+$total->amount;
                    $total->save();
                }else{
                    $total=new Vendortotal;
                    $total->vendor_id=$request->vendor;
                    $total->date=date('Y-m-d');
                    $total->total=$request->amount;
                    $total->save();

                }

                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Payment Successful',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Payment unsuccessful',
                   
                 );
                 return redirect()->back()->with($notification);
            }
            
           
        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Something went wrong. Please try again later.',
                
        //      );
        //      return redirect()->back()->with($notification);
        
        // }
    
    }

    public function show($id)
    {
        $sale=DB::table('order_details')->where('vendor_id',$id)->get();
        $totalsale=0;
        foreach ($sale as $value) {
           if($value->coupon){
            $totalsale+=$value->price_after_coupon;
           }else{
            $totalsale+=$value->price;

           }
        }
        $totalpaid=DB::table('payments')->where('vendor_id',$id)->sum('amount');

        $payment=Payment::where('vendor_id',$id)->orderBy('id','desc')->get();
       return view('backend.payment.show',compact('payment','totalsale','totalpaid'));
    }
  
  

    public function filter(Request $request){
        $data="SELECT payments.*,users.name,users.id as vid FROM payments JOIN users ON users.id=payments.vendor_id WHERE payments.payment_mode != '' ";
    
        if(isset($request->vendor) && !empty($request->vendor)){
            $data .="  AND users.id = $request->vendor ";
        }
      
         if(isset($request->status) && !empty($request->status)){
            $data .="  AND payments.payment_mode = '$request->status' ";
        }
       
      
        if(isset($request->to) && !empty($request->to) ||isset($request->from) && !empty($request->from)){
            $data .=" AND   payments.created_at BETWEEN '$request->from' AND '$request->to'";
        }
        
      
        $vendor=DB::select($data);
      
      $jsondata= "";
    
      $i=1;
      foreach ($vendor as $item){
      
        $jsondata.="<tr><td>".$i++."</td><td>$item->date<br>$item->time</td><td>$item->payment_id</td><td>$item->name <a href='".route('admin.vendor.edit',['id'=>$item->vid])."' class='btn btn-primary'><i class='far fa-eye'></i></a></td><td>$item->payment_mode</td><td>$item->amount</td><td> <img src='".asset($item->image)."' width='80'></td></tr>";
      }
      
      
        return response()->json($jsondata);
      
    }
    
    public function export(Request $request) 
    {
        return Excel::download(new PaymentExport($request->all()) , 'payment.xlsx');
    }


}
