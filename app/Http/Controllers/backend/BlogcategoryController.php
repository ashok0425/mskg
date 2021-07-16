<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blogcategory;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use File;
class BlogcategoryController extends Controller
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
        $blog=Blogcategory::orderBy('id','desc')->get();
       return view('backend.blog.category.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.blog.category.create');
        
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
            'category'=>'required|max:255|unique:blogcategories',
        ]);
        try {
 
            $category=new Blogcategory;
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'blogcategory.'.$file->getClientOriginalExtension();
                $category->image='upload/blog/category/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/blog/category/',$fname);
            }
            $category->category=$request->category;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Category  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Category  not added',
                   
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
    public function edit(Blogcategory $category,$id)
    {
        $category=Blogcategory::find($id);
        return view('backend.blog.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogcategory $category)
    {
        $request->validate([
            'category'=>'required|max:255',
        ]);
        try {

            $category=Blogcategory::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete($category->image);
                $fname=rand().'category.'.$file->getClientOriginalExtension();
                $category->image='upload/blog/category/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/blog/category/',$fname);
            }
            $category->category=$request->category;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Category  updated',
                   
                 );
                 return redirect()->route('admin.blogcategory')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Category  not updated',
                   
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
    
}
