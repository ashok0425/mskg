<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Subcategory;
use App\Models\Part;
use File;
class PartController extends Controller
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
        $part=Part::orderBy('id','desc')->get();
       return view('backend.part.index',compact('part'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
       return view('backend.part.create',compact('category'));
        
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
            'subcategory'=>'required',
            'category'=>'required',
            'modal'=>'required',
            'part'=>'required',
            'price'=>'required',



        ]);
        try {
 
            $category=new Part;
           
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'accesssories.'.$file->getClientOriginalExtension();
                $category->image='upload/accesssories/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/accesssories/',$fname);
            }
            
            $category->category_id=$request->category;

            $category->subcategory_id=$request->subcategory;
           
            $category->modal_id=$request->modal;
            $category->price=$request->price;

            $category->part=$request->part;
       

            if($category->save()){
                
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Accessories  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Accessories  not added',
                   
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
    public function edit(Category $category,$id)
    {
        $part=Part::find($id);
        $category=Category::all();
        $subcategory=Subcategory::all();
     



        return view('backend.part.edit',compact('part','subcategory','category'));
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
        $request->validate([
            'subcategory'=>'required',
            'category'=>'required',
            'modal'=>'required',
            'part'=>'required',
            'price'=>'required',




        ]);
        try {
            $category=Part::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete($category->image);
                $fname=rand().'accesssories.'.$file->getClientOriginalExtension();
                $category->image='upload/accesssories/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/accesssories/',$fname);
            }
            $category->category_id=$request->category;

            $category->subcategory_id=$request->subcategory;
           
            $category->modal_id=$request->modal;
            $category->part=$request->part;
            $category->price=$request->price;




            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Accesroies  updated',
                   
                 );
                 return redirect()->route('admin.part')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Accessories  not updated',
                   
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
    $category=Part::find($id);
    return view('backend.part.show',compact('category'));
    }
}
