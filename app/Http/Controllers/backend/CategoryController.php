<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use File;
class CategoryController extends Controller
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
        $category=Category::all();
     
       return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.category.create');
        
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
            'category'=>'required|max:255|unique:categories',
        ]);
        try {
 
            $category=new Category;
            
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'category.'.$file->getClientOriginalExtension();
                $category->image='upload/category/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/category/',$fname);
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
    public function edit(Category $category,$id)
    {
        $category=Category::find($id);
        return view('backend.category.edit',compact('category'));
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
            'category'=>'required|max:255',
        ]);
        try {

            $category=Category::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete(public_path($category->image));
                $fname=rand().'category.'.$file->getClientOriginalExtension();
                $category->image='upload/category/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move('upload/category/',$fname);
            }
            $category->category=$request->category;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Category  updated',
                   
                 );
                 return redirect()->route('admin.category')->with($notification);
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
    public function show($id){
    $category=Category::find($id);
    return view('backend.category.show',compact('category'));
    }
}
