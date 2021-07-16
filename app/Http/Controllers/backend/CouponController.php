<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Traits\status;

use File;
class CouponController extends Controller
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
        $coupon=Coupon::orderBy('id','desc')->get();
       return view('backend.coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.coupon.create');
        
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
            'coupon'=>'required|unique:coupons',
            'price'=>'required',
            'expire_at'=>'required',


        ]);
        try {
 
            $category=new Coupon;
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'Coupon.'.$file->getClientOriginalExtension();
                $category->image='upload/coupon/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/coupon/',$fname);
            }
            $category->coupon=$request->coupon;
            $category->price=$request->price;
            $category->expire_at=$request->expire_at;
            $category->card_value=$request->card_value;

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Coupon  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Coupon  not added',
                   
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon,$id)
    {
        $category=Coupon::find($id);
        return view('backend.coupon.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'coupon'=>'required',
            'price'=>'required',
            'expire_at'=>'required',


        ]);
        try {

            $category=Coupon::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete($category->image);
                $fname=rand().'coupon.'.$file->getClientOriginalExtension();
                $category->image='upload/coupon/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/coupon/',$fname);
            }
            $category->coupon=$request->coupon;
            $category->price=$request->price;
            $category->expire_at=$request->expire_at;
            $category->card_value=$request->card_value;

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Coupon  updated',
                   
                 );
                 return redirect()->route('admin.coupon')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Coupon  not updated',
                   
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id){
    $coupon=Coupon::find($id);
    return view('backend.coupon.show',compact('coupon'));
    }
}
