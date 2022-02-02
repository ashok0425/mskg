<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;
use App\Models\Order_detail;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Menu::orderBy('id','desc')->get();
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
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
            'name'=>'required|unique:menus',
            'price'=>'required',

        ]);
        $menu=new Menu;
        $menu->name=$request->name;
        $menu->price=$request->price;
        $menu->menu_no=$request->menu_no;
        $file=$request->file('file');

        if($file){
            $fname=rand().'menu.'.$file->getClientOriginalExtension();
            $menu->image='upload/menu/'.$fname;
            $file->move(public_path().'/upload/menu/',$fname);
        }
        $menu->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Menu Created succesfully',
           
         );
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create new menu  ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        try {
            //code...
        
        $request->validate([
            'name'=>'required',
            'price'=>'required',

        ]);
        $menus=Menu::find($menu->id);
        $menus->name=$request->name;
        $menus->price=$request->price;
        $menus->menu_no=$request->menu_no;
        $file=$request->file('file');

        if($file){
            File::delete($menus->image);
            $fname=rand().'menu.'.$file->getClientOriginalExtension();
            $menus->image='upload/menu/'.$fname;
            $file->move(public_path().'/upload/menu/',$fname);
        }

        $menus->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Menu updated succesfully',
           
         );
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to update  menu  ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,$id)
    {
        $order=Order_detail::where('menu_id',$id)->first();
        if($order){
            $notification=array(
                'alert-type'=>'info',
                'messege'=>'You cant delete this item.As this order exists in sell list',
               
             );
             return redirect()->back()->with($notification);
        }
        $menu=Menu::find($id);
        File::delete($menu->image);
        $menu->delete();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Menu Deleted succesfully',
           
         );
         return redirect()->back()->with($notification);

    }
}
