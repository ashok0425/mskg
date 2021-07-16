<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Apponitment;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\ApponitmentDetail;
use File;
class AppointmentController extends Controller
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
        $appointment=Apponitment::where('status','!=',0)->get();

       return view('backend.appointment.index',compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     
        try {
 
            $category=Apponitment::find($request->id);
            $category->status=$request->status;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Status  updated',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Status  not updated',
                   
                 );
                 return redirect()->route('admin.appointment')->with($notification);
            }
            
           
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Something went wrong. Please try again later.',
                
             );
             return redirect()->back()->with($notification);
        
        }
    
    }




    public function paidStatus(Request $request)
    {
        try {

            $category=Apponitment::find($request->id);
            $category->ispaid=$request->ispaid;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Paid status  updated',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Paid status  not updated',
                   
                 );
                 return redirect()->route('admin.appointment')->with($notification);
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Apponitment $appointment,$id)
    {
        $appo=ApponitmentDetail::where('appointment_id',$id)->get();
        $appointment=Apponitment::find($id);
        return view('backend.appointment.edit',compact('appointment','appo'));
    }


    public function complete(Apponitment $appointment)
    {
        $appointment=Apponitment::where('status',2)->get();
        return view('backend.appointment.complete',compact('appointment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id){
    $category=Category::find($id);
    return view('backend.category.show',compact('category'));
    }
}
