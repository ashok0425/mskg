<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Page;
use App\Models\advertisment;
use File;
use App\Http\Traits\status;
class AddController extends Controller
{
    use status;

    

    public function index(){
        $banner=advertisment::all();
        return view('backend.add.index',compact('banner'));
    }

    
    public function create(){
        return view('backend.add.create');
    }

    public function store(Request $request){
        $banner=new advertisment;
        $request->validate([
            'file'=>'required',
        ]);
        $file=$request->file('file');

        if($file){
            // File::delete(__getAdmin()->profile_photo_path);
            $fname=rand().'add.'.$file->getClientOriginalExtension();
            $banner->image='upload/add/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $file->move(public_path().'/upload/add/',$fname);
                }
        $banner->title=$request->title;
        
$banner->save();
$notification=array(
    'alert-type'=>'success',
    'messege'=>'Advertisement Added',
    
);
return redirect()->back()->with($notification);
    }



    public function edit($id){
        $banner=advertisment::find($id);
        return view('backend.add.edit',compact('banner'));
    }

  
    public function update(Request $request){
        // dd($request->all());
        $banner=advertisment::find($request->id);
        
        $file=$request->file('file');

        if($file){
            File::delete(public_path($banner->image));
            $fname=rand().'banner.'.$file->getClientOriginalExtension();
            $banner->image='upload/add/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $file->move(public_path().'/upload/add/',$fname);
                }
        $banner->title=$request->title;;
$banner->save();
$notification=array(
    'alert-type'=>'success',
    'messege'=>'Advertisement updated',
    
);
return redirect()->route('admin.add')->with($notification);

}


}
