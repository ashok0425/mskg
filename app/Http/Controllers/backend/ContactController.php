<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Mail\contactmail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact=Contact::orderBy('id','desc')->get();
       return view('backend.contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
     $con=Contact::find($id);
       return view('backend.contact.create',compact('con'));
        
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
            'email'=>'required|unique:subscribers',

        ]);
        try {
            $category=new Subscriber;  
            $file=$request->file('file');

            $category->email=$request->email;

    
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Thankyou for Subscribing our Newsletter',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Something wrong.Try again later',
                   
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
  /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogcategory  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    

     public function sendmail(Request $request){

        $file=$request->file('file');
           
        if($file){
            $fname=rand().'category.'.$file->getClientOriginalExtension();
            $file->move('upload/email/contact/',$fname);
           
        }
        $data['email']=$request->email;
        $data['title']=$request->title;
        $data['detail']=$request->detail;
        
        $file=asset("upload/email/contact/$fname");
        Mail::send('mail.contact', $data, function ($message) use ($data,$file) {
            $message->to($data['email'])->subject($data['title'])->attach($file);
       
      
        });
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Email sucessfully send to selected client',
               
             );
             return redirect()->back()->with($notification);
     }
}
