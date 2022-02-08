<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;
use App\Models\Order_detail;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            //code...
        
        $request->validate([
            'name'=>'required|unique:categories',
        ]);
        $category=new Category;
        $category->name=$request->name;
        $file=$request->file('file');

        if($file){
            $fname=rand().'category.'.$file->getClientOriginalExtension();
            $category->image='upload/category/'.$fname;
            $file->move(public_path().'/upload/category/',$fname);
        }
        $category->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'category Created succesfully',
           
         );
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create new category  ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            //code...
        
        $request->validate([
            'name'=>'required',

        ]);
        $category=Category::find($category->id);
        $category->name=$request->name;
        $file=$request->file('file');

        if($file){
            File::delete($category->image);
            $fname=rand().'category.'.$file->getClientOriginalExtension();
            $category->image='upload/category/'.$fname;
            $file->move(public_path().'/upload/category/',$fname);
        }

        $category->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'category updated succesfully',
           
         );
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to update  category  ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $category,$id)
    {
        $order=Order_detail::where('menu_id',$id)->first();
        if($order){
            $notification=array(
                'alert-type'=>'info',
                'messege'=>'You cant delete this item.As this order exists in sell list',
               
             );
             return redirect()->back()->with($notification);
        }
        $category=Menu::find($id);
        File::delete($category->image);
        $category->delete();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Menu Deleted succesfully',
           
         );
         return redirect()->back()->with($notification);

    }
}
