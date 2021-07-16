<?php

namespace App\Http\Controllers\Vendorpanel;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use File;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopGallery;
class ShopController extends Controller
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
        $shop=Shop::where('vendor_id',Auth::user()->id)->get();
     
       return view('vendorpanel.shop.index',compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('vendorpanel.shop.create');
        
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
            'name'=>'required|max:255',
            'description'=>'required',


        ]);
        try {
 
            $category=new Shop;
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'shop.'.$file->getClientOriginalExtension();
                $category->image='upload/vendor/shop/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/vendor/shop/',$fname);
            }

            $file=$request->file('cover');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'shopcover.'.$file->getClientOriginalExtension();
                $category->cover='upload/vendor/shop/cover/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/vendor/shop/cover/',$fname);
            }
            $category->name=$request->name;
            $category->vendor_id=Auth::user()->id;

            $category->descr=$request->description;
            $category->latitude=$request->latitude;
            $category->longitude=$request->longitude;
            $category->status=1;
            $category->address=$request->address;
            $category->contact=$request->contact_no;
            if($category->save()){
                $file=$request->file('gallery');
           
                if($file){
                    foreach($file as $img){
                    $gallery=new ShopGallery;
                    // File::delete(__getAdmin()->profile_photo_path);
                    $fname=rand().'shop.'.$img->getClientOriginalExtension();
                    $gallery->image='upload/vendor/shop/gallery/'.$fname;
                    // $path=Image::make($file)->resize(200,300);
                    $img->move(public_path().'/upload/vendor/shop/gallery/',$fname);
                    $gallery->shop_id=$category->id;
                    $gallery->save();
                }
               
                }
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Shop  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Shop  not added',
                   
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
 
    public function edit(Shop $category,$id)
    {
        $shop=Shop::where('vendor_id',Auth::user()->id)->find($id);
        return view('vendorpanel.shop.edit',compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $category)
    {
        // try {
 
            $category=Shop::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'shop.'.$file->getClientOriginalExtension();
                $category->image='upload/vendor/shop/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/vendor/shop/',$fname);
            }

            $file=$request->file('cover');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'shopcover.'.$file->getClientOriginalExtension();
                $category->cover='upload/vendor/shop/cover/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/vendor/shop/cover/',$fname);
            }
            $category->name=$request->name;

            $category->descr=$request->description;
            $category->latitude=$request->latitude;
            $category->longitude=$request->longitude;
            $category->status=1;
            $category->address=$request->address;
            $category->contact=$request->contact_no;
            if($category->save()){
                $file=$request->file('gallery');
           
                if($file){
                    ShopGallery::where('shop_id',$request->id)->delete();
                    foreach($file as $img){
                    $gallery=new ShopGallery;
                    // File::delete(__getAdmin()->profile_photo_path);
                    $fname=rand().'shop.'.$img->getClientOriginalExtension();
                    $gallery->image='upload/vendor/shop/gallery/'.$fname;
                    // $path=Image::make($file)->resize(200,300);
                    $img->move(public_path().'/upload/vendor/shop/gallery/',$fname);
                    $gallery->shop_id=$category->id;
                    $gallery->save();
                }
               
                }
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Shop  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Shop  not added',
                   
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
    public function show($id){
    $category=Category::find($id);
    return view('backend.category.show',compact('category'));
    }
}
