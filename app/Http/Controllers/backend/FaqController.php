<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\faq;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Blogcategory;
use File;
class FaqController extends Controller
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
        $blog=faq::orderBy('id','desc')->get();
       return view('backend.faq.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.faq.create');
        
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
            'title'=>'required|max:255',
            'description'=>'required',


        ]);
        // try {
 
            $category=new faq;
            
            
            $category->title=$request->title;
            $category->desrc=$request->description;

    
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'faq  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Faq  not added',
                   
                 );
                 return redirect()->back()->with($notification);
            }
            
           
        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Something went wrong. Please try again later.',
                
        //      );
        //      return redirect()->back()->with($notification);
        
        // }
    
    }
  /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(faq $blog,$id)
    {
        ;

        $blog=faq::find($id);
        return view('backend.faq.edit',compact('blog'));
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
            'title'=>'required|max:255',
            'description'=>'required',

        ]);
        try {

            $category=faq::find($request->id);
            
            $category->title=$request->title;
            $category->desrc=$request->description;
            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Faq  updated',
                   
                 );
                 return redirect()->route('admin.faq')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Faq  not updated',
                   
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

   
    
}
