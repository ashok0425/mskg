<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Productcolor;
use App\Models\Productvariation;
use File;
class ProductvariationController extends Controller
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
       return view('backend.product.variation.create',compact('pid'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // try {
 
            $category=new Productvariation;
            
            $file=$request->file('file');
           
         
          
            $category->variation=$request->variation;
            $category->price=$request->price;
            $category->comission=$request->comission;
            $category->price_after_comission=$request->price_after_comission;
            $category->product_id=$request->pid;

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Product variation  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Product variation  not added',
                   
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
    public function edit(Productvariation $productcolor,$id)
    {
        $color=Productvariation::find($id);
        return view('backend.product.variation.edit',compact('color'));
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

            $category=Productvariation::find($request->id);
            $category->variation=$request->variation;
            $category->price=$request->price;
            $category->comission=$request->comission;
            $category->price_after_comission=$request->price_after_comission;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Product color  updated',
                   
                 );
                 return redirect()->route('admin.product.attribute',['id'=>$request->pid])->with($notification);
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
