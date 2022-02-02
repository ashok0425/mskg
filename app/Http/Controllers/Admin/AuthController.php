<?php
namespace App\Http\Controllers\Admin;
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
        return view('admin.login')->with('messege','error');
    }


    public function show(){
       
        return view('admin.dashboard');
    }

    public function profile(){
        return view('admin.profile.profile');
    }

    public function store(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
       if(!Auth::guard('admin')->attempt($request->only('email','password'))){
      
           $notification=array(
              'messege'=>'Invalid username or password',
               'alert-type'=>'error'
           );
         
         return redirect()->route('admin.login')->with($notification);
       }
          return redirect()->route('admin.dashboard');
    }

public function update(Request $request){
$request->validate([
    'email'=>'email|required',
    'name'=>"required",
]);
try {
 
    $admin=Admin::find(__getAdmin()->id);
    
    
    $file=$request->file('file');
    if($file){
        File::delete($admin->profile_photo_path);
        $fname=rand().'admin.'.$file->getClientOriginalExtension();
        $admin->profile_photo_path='upload/admin/'.$fname;
        $path=$file->move(public_path().'/upload/admin/',$fname);

    }
    $admin->email=$request->email;
    $admin->name=$request->name;
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
        'messege'=>'Something went wrong.Please try again later',
        
     );
     return redirect()->back()->with($notification);

}
}


function password (){
return view('admin.profile.password');
}


function password_update(Request $request){
    $request->validate([
        'currentpassword'=>'required',
        'newpassword'=>'required|min:8|max:16',
        'confirmpassword'=>'required|same:newpassword',

    ]);
    try {

        if(Hash::check($request->currentpassword, __getAdmin()->password)){
                $admin=Admin::find( __getAdmin()->id);
                $admin->password=Hash::make($request->newpassword);
                
$admin->save();
    Auth::logout();
   session()->flush();
    $notification=array(
        'alert-type'=>'error',
        'messege'=>'Password updated please login again !',
         
     );
     return redirect()->route('admin.login')->with($notification);

          
              }else{
                $notification=array(
                    'alert-type'=>'error',
                    'messege'=>'Inccorect Password',
                   
                 );
                 return redirect()->back()->with($notification);
              }
    

    } catch (\Throwable $th) {
        //throw $th;
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
            return redirect()->route('admin.login')->with($notification);
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
