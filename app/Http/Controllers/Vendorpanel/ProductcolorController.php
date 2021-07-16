<?php

namespace App\Http\Controllers\Vendorpanel;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Productcolor;
use File;
use Illuminate\Support\Facades\Auth;
class ProductcolorController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pid=$id;
       return view('vendorpanel.product.color.create',compact('pid'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        try {
 
            $category=new Productcolor;
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'productcolor.'.$file->getClientOriginalExtension();
                $category->image='upload/productcolor/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/productcolor/',$fname);
            }
            $category->color=$request->color;
            $category->vendor_id=Auth::user()->id;

            $category->product_id=$request->pid;

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Product color  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Product color  not added',
                   
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
    public function edit(Productcolor $productcolor,$id)
    {

        try {
            //code...
        
        $color=Productcolor::where('vendor_id',Auth::user()->id)->where('id',$id)->first();

if($color){
    return view('vendorpanel.product.color.edit',compact('color'));

}else{
    $notification=array(
        'alert-type'=>'error',
        'messege'=>'Something went wrong. Please try again later.',
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        // try {

            $category=Productcolor::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete(public_path($category->image));
                $fname=rand().'productcolor.'.$file->getClientOriginalExtension();
                $category->image='upload/productcolor/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/productcolor/',$fname);
            }
            $category->color=$request->color;
       

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Product color  updated',
                   
                 );
                 return redirect()->route('vendor.product.attribute',['id'=>$request->pid])->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Product color  not updated',
                   
                 );
                 return redirect()->back()->with($notification);
            }
            
           
        // } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Something went wrong. Please try again later.',
                
             );
             return redirect()->back()->with($notification);
        
        // }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    
}
