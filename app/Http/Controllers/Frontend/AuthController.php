<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

use File;
use Hash;
use session;

class AuthController extends Controller
{
    public function index(){
        return view('frontend.profile');
    }


  


public function update(Request $request){
// try {
 
    $admin=User::find(Auth::user()->id);
    $admin->name=$request->name;
    $admin->email=$request->email;
    
    
    $file=$request->file('file');
   
    if($file){
        
        File::delete(public_path($admin->profile_photo_path));
        $fname=rand().'user.'.$file->getClientOriginalExtension();
        $admin->profile_photo_path='upload/user/'.$fname;
        $path=$file->move(public_path().'/upload/user/',$fname);

    }
    
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
    
   
// } catch (\Throwable $th) {
//     $notification=array(
//         'alert-type'=>'error',
//         'messege'=>'Something went wrong. Please try again later.',
        
//      );
     return redirect()->back()->with($notification);

// }
}
function changePassword(Request $request){
    try {

        if(Hash::check($request->currentpassword, Auth::user()->password)){
            if($request->newpassword===$request->confirmpassword){
                $admin=User::find(Auth::user()->id);
                
                $admin->password=Hash::make($request->newpassword);
                
$admin->save();
    Auth::logout();
   session()->flush();
    $notification=array(
        'alert-type'=>'error',
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
            'alert-type'=>'error',
            'messege'=>'Something went wrong .please try again later',
           
         );
         return redirect()->back()->with($notification);
    }
 
      
      }



    public function destory(){
        try {
            Auth::logout();
            session()->flush();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'successfully logout !',
                 
             );
          
            return redirect()->route('login')->with($notification);
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
