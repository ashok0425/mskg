<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Website;
use File;
use App\Http\Traits\status;
class SettingController extends Controller
{
    use status;

    public function page(){
        $page=Page::find(1);
        return view('backend.setting.page',compact('page'));
    }

    public function frontendUpdate (Request $request){
        $page=Page::find(1);
        $page->about=$request->about;
        $page->policy=$request->policy;
        $page->price=$request->price;
        $page->term=$request->term;
$page->save();
$notification=array(
    'alert-type'=>'success',
    'messege'=>'Page setting updated',
    
 );
 return redirect()->back()->with($notification);
    }

   

    public function website(){
        $website=Website::find(1);
        return view('backend.setting.website',compact('website'));
    }

    public function websiteUpdate(Request $request){
        $web=Website::find(1);
        $file=$request->file('file');

        if($file){
            File::delete(public_path($web->image));
            $fname=rand().'seeting.'.$file->getClientOriginalExtension();
            $web->image='upload/setting/logo/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $file->move(public_path().'/upload/setting/logo/',$fname);
                }
$web->title=$request->title;
$web->keyword=$request->keyword;
$web->descr=$request->descr;
$web->tax=$request->tax;
$web->shipping_charge=$request->shipping_charge;


$web->email1=$request->email1;

$web->phone1=$request->phone;
$web->comission=$request->comission;

$web->address1=$request->address1;
$web->address2=$request->address2;
$web->url=$request->url;

$web->facebook1=$request->facebook1;
$web->twitter1=$request->twitter1;
$web->instagram1=$request->instagram1;
$web->other1=$request->other1;
$web->email2=$request->email2;
$web->phone2=$request->phone2;
$web->address2=$request->address2;
$web->facebook2=$request->facebook2;
$web->twitter2=$request->twitter2;
$web->instagram2=$request->instagram2;
$web->other2=$request->other2;
        $web->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'website setting updated',
            
        );
 return redirect()->back()->with($notification);
    }



    public function index(){
        $banner=Banner::all();
        return view('backend.banner.index',compact('banner'));
    }

    
    public function create(){
        return view('backend.banner.create');
    }

    public function store(Request $request){
        $banner=new Banner;
        $request->validate([
            'file'=>'required',
        ]);
        $file=$request->file('file');

        if($file){
            // File::delete(__getAdmin()->profile_photo_path);
            $fname=rand().'banner.'.$file->getClientOriginalExtension();
            $banner->image='upload/setting/banner/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $file->move(public_path().'/upload/setting/banner/',$fname);
                }
        $banner->title=$request->title;
        $banner->text=$request->text;
$banner->save();
$notification=array(
    'alert-type'=>'success',
    'messege'=>'Banner Added',
    
);
return redirect()->back()->with($notification);
    }



    public function edit($id){
        $banner=Banner::find($id);
        return view('backend.banner.edit',compact('banner'));
    }

  
    public function update(Request $request){
        
        $banner=Banner::find($request->id);
        
        $file=$request->file('file');

        if($file){
            File::delete($banner->image);
            $fname=rand().'banner.'.$file->getClientOriginalExtension();
            $banner->image='upload/setting/banner/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $file->move(public_path().'/upload/setting/banner/',$fname);
                }
     
        $banner->text=$request->text;
        $banner->title=$request->title;
$banner->save();
$notification=array(
    'alert-type'=>'success',
    'messege'=>'Banner updated',
    
);
return redirect()->route('admin.banner')->with($notification);

}

public function show($id){
    $category=Banner::find($id);
    return view('backend.banner.show',compact('category'));
}
}
