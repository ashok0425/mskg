<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Blogcategory;
use App\Models\User;
use File;
use DB;
use App\Models\Vendorcoupon;

class VendorController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function newVendor()
    {
        $vendor=User::where('company_address','!=',null)->where('Isvendor',null)->orderBy('id','desc')->get();
       return view('backend.vendor.newvendor',compact('vendor'));
    }

    public function index()
    {
        $vendor=User::where('company_address','!=',null)->orderBy('id','desc')->get();
       return view('backend.vendor.index',compact('vendor'));
    }

    
    public function membership()
    {
        $vendor=User::where('company_address','!=',null)->where('membership','!=',null)->orderBy('id','desc')->get();
       return view('backend.vendor.membership',compact('vendor'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupon()
    {
        $coupon=DB::table('vendorcoupons')->join('users','users.id','vendorcoupons.vendor_id')->select('vendorcoupons.*','users.name as uname','users.phone','users.id as uid')->orderBy('id','desc')->get();
       return view('backend.vendor.coupon',compact('coupon'));
        
    }


    public function pendingcoupon()
    {
        $coupon=DB::table('vendorcoupons')->join('users','users.id','vendorcoupons.vendor_id')->select('vendorcoupons.*','users.name as uname','users.phone','users.id as uid')->where('vendorcoupons.Isapproved',null)->orderBy('id','desc')->get();
       return view('backend.vendor.newcoupon',compact('coupon'));
        
    }

    public function editcoupon(Request $request)
    {
        $coupon=Vendorcoupon::find($request->cid);
        $coupon->Isapproved=$request->isapproved;

        $coupon->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Coupon Updated',
            
         );
         return redirect()->back()->with($notification);
        
    }

   
  
    public function edit(User $user,$id)
    {
       

        $vendor=User::find($id);
        return view('backend.vendor.edit',compact('vendor'));
    }

  
    public function update(Request $request)
    {
      
        try {

            $category=User::find($request->id);
            
            $category->Isvendor=1;
        if(isset($request->status)){
            $category->status=$request->status;
        }

            if($category->save()){
        if($category->status==1){

                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Vendor Request Accepted',
                   
                 );
                }else {
                 $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Vendor Blocked',
                   
                 );
                   }
                 return redirect()->route('admin.vendor')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Vendor Request Not  Accepted ',
                   
                 );
                 return redirect()->back()->with($notification);
            }
            
           
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Something went wrong. Please try again later.',
                
             );
             return redirect()->back()->with($notification);
        
        }
    
    }



    protected function block($id){
        DB::table('users')->where('id',$id)->update([
            'membership'=>3,
        ]);
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Membership Reject',
           
         );
         return redirect()->back()->with($notification);
    }
   
    protected function accept($id){
        DB::table('users')->where('id',$id)->update([
            'membership'=>2,
        ]);
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Membership Approved',
           
         );
         return redirect()->back()->with($notification);
    }
}
