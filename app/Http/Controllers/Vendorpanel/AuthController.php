<?php
namespace App\Http\Controllers\Vendorpanel;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vendor;
use File;
use Hash;
use session;
class AuthController extends Controller
{
    public function index(){

    return view('vendorpanel.register');
    }

    public function membership(){
        $vendor=User::find(Auth::user()->id);
$vendor->membership=1;
$vendor->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Your request to become a Member has been placed.',
             
         );
         return redirect()->back()->with($notification);
        }

    public function show(){
        return view('vendorpanel.dashboard');
    }

    public function profile(){
        return view('vendorpanel.profile');
    }

public function register(Request $request){
$request->validate([
    'name'=>'required',
    'email'=>'required|unique:users',
    'phone'=>'required|min:10|max:10',
    'company_name'=>'required',
    'address'=>'required',
    'state'=>'required',
    'password'=>'required',
    'password_confirmation'=>'required',
]);
try {
    //code...
if(isset($request->company_pan) && strlen($request->company_pan)!==9){

    $notification=array(
        'alert-type'=>'error',
        'messege'=>'Company pan number must be 9 digit.',
         
     );
     return redirect()->back()->with($notification);
}
  if($request->password===$request->password_confirmation){

    $admin=new User;
    $admin->name=$request->name;
    $admin->email=$request->email;

    $admin->company_state=$request->state;
    $admin->company_address=$request->address;
    $admin->company_name=$request->company_name;
    $admin->phone=$request->phone;
    $admin->company_pan=$request->company_pan;
    $admin->password=Hash::make($request->password);
    if($admin->save()){
        
      $notification=array(
            'alert-type'=>'success',
            'messege'=>'Thank you for registering on Krafftbox as a Vendor. We’ll get back to you with confirmation as soon as possible',
             
         );
         if(Auth::check()){
             return redirect()->route('/')->with($notification);
         }else{
             return redirect()->route('login')->with($notification);
         }
    }else{
        $notification=array(
            'alert-type'=>'error',
            'messege'=>'Something went wrong. Please try again later.',
             
         );
         return redirect()->back()->with($notification);
    }

  }else{

    $notification=array(
        'alert-type'=>'error',
        'messege'=>'Password not match',
         
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

public function update(Request $request){
$request->validate([
    'email'=>'email|required',
    'name'=>"required",
]);
try {
 
    $admin=User::find(Auth::user()->id);
    
    
    $file=$request->file('file');
   
    if($file){
        File::delete(public_path($admin->profile_photo_path));
        $fname=rand().'vendor.'.$file->getClientOriginalExtension();
        $admin->profile_photo_path='upload/vendor/'.$fname;
        $file->move(public_path().'/upload/vendor/',$fname);

    }
    $admin->email=$request->email;
    $admin->name=$request->name;
    $admin->company_state=$request->company_state;
    $admin->company_address=$request->company_address;
    $admin->company_name=$request->company_name;

    $admin->phone=$request->phone;
    $admin->company_pan=$request->company_pan;

    if($admin->save()){
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Profile  updated',
           
         );
         return redirect()->back()->with($notification);
    }else{
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Profile  not updated',
           
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


function changePassword(Request $request){
    $request->validate([
        'newpassword'=>'required|min:8|max:16',
        'confirmpassword'=>'required|min:8|max:16',

    ]);
    try {

        if(Hash::check($request->currentpassword, Auth::user()->password)){
            if($request->newpassword===$request->confirmpassword){
                $admin=User::find( Auth::user()->id);
                $admin->password=Hash::make($request->newpassword);
                
$admin->save();
    Auth::logout();
   session()->flush();
    $notification=array(
        'alert-type'=>'success',
        'messege'=>'Password updated please login again !',
         
     );
     return redirect()->route('login')->with($notification);

            }else{
                $notification=array(
                    'alert-type'=>'error',
                    'messege'=>'Password not match',
                     
                 );
                 return redirect()->back()->with($notification);
            }
              }else{
                $notification=array(
                    'alert-type'=>'error',
                    'messege'=>'Inccorect Password',
                   
                 );
                 return redirect()->back()->with($notification);
              }
    

    } catch (\Throwable $th) {
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'something went wrong please try again later !',
             
         );
        return redirect()->back()->with($notification);;
    }
 
      
      }






    public function destory(){
        try {
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'successfully logout !',
                 
             );
            Auth::logout();
         session()->flush();
            return redirect()->route('vendor.logins')->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'info',
                'messege'=>'something went wrong please try again later !',
                 
             );
            Auth::logout();
            return redirect()->back()->with($notification);;
        }
    
    }

}
