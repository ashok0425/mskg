<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Subcategory;
use File;
class SubcategoryController extends Controller
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
        $subcategory=Subcategory::orderBy('id','desc')->get();
       return view('backend.subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
       return view('backend.subcategory.create',compact('category'));
        
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
            'subcategory'=>'required|max:255|unique:subcategories',
            'category'=>'required',

        ]);
        try {
 
            $category=new Subcategory;
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'category.'.$file->getClientOriginalExtension();
                $category->image='upload/subcategory/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/subcategory/',$fname);
            }
            $category->subcategory=$request->subcategory;
            $category->category_id=$request->category;

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Subcategory  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'SubCategory  not added',
                   
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
        $subcategory=Subcategory::find($id);
        $category=category::all();

        return view('backend.subcategory.edit',compact('subcategory','category'));
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
            'subcategory'=>'required|max:255',
            'category'=>'required',

        ]);
        try {

            $category=Subcategory::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete($category->image);
                $fname=rand().'category.'.$file->getClientOriginalExtension();
                $category->image='upload/subcategory/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/subcategory/',$fname);
            }
            $category->subcategory=$request->subcategory;
            $category->category_id=$request->category;

            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'subcategory  updated',
                   
                 );
                 return redirect()->route('admin.subcategory')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'subategory  not updated',
                   
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
    $category=Subcategory::find($id);
    return view('backend.subcategory.show',compact('category'));
    }
}






