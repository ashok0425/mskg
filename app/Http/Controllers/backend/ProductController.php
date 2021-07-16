<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Subcategory;
use App\Models\Website;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Productvariation;
use DB;

use File;
class ProductController extends Controller
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
        $product=DB::table('products')->leftjoin('shops','shops.id','products.shop_id')->join('categories','categories.id','products.category_id')->select('products.*','shops.name as sname','categories.category')->orderBy('products.id','desc')->get();
       return view('backend.product.index',compact('product'));
    }

   
    public function create()
    {
        $category=Category::all();
       return view('backend.product.create',compact('category'));
        
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
            'category'=>'required',
            'name'=>'required',
            'price'=>'required',
        ]);
        try {
            $category=new Product;
           
            $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'product.'.$file->getClientOriginalExtension();
                $category->image='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/product/',$fname);
            }
            $front=$request->file('front');

            if($front){
               
                $fname=rand().'productf.'.$front->getClientOriginalExtension();
                $category->front='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $front->move(public_path().'/upload/product/',$fname);
            }
            $back=$request->file('back');

            if($back){
              
                $fname=rand().'productb.'.$back->getClientOriginalExtension();
                $category->back='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $back->move(public_path().'/upload/product/',$fname);
            }
            $left=$request->file('left');

            if($left){
                
                $fname=rand().'productl.'.$left->getClientOriginalExtension();
                $category->left='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $left->move(public_path().'/upload/product/',$fname);
            }
            $right=$request->file('right');

            if($right){
               
                $fname=rand().'productr.'.$right->getClientOriginalExtension();
                $category->right='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $right->move(public_path().'/upload/product/',$fname);
            }
            $category->material=$request->material_used;
       

            $category->category_id=$request->category;
            $category->subcategory_id=$request->subcategory;
            $category->price=$request->price;
            $category->comission=$request->comission;
            $category->price_after_comission=$request->price_after_comission;
            $category->name=$request->name;
            $category->delivery_time=$request->delivery_time;
            $category->featured=$request->featured;
            $category->top_rated=$request->top_rated;
            $category->bestseller=$request->bestseller;
            $category->short_desc=$request->short_description;
            $category->descr=$request->long_description;
            $category->shop_id=$request->shop;
            $category->recipt=$request->recipt;

            // $category->vendor_id=Auth::user()->id;
            $category->meta_title=$request->meta_title;
            $category->meta_descr=$request->meta_description;
            $category->meta_keyword=$request->meta_keyword;
            $category->qty=$request->quantity;
            $category->Iscustomized=$request->iscustomized;
            $category->term=$request->term;
            $category->top_rated=$request->top_rated;
            $category->bestseller=$request->bestseller;
            $category->material=$request->material_used;


            if($category->save()){
                
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Product  Added',
                   
                 );
                 return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Product  not added',
                   
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
    public function productCommision($val){
        $comission=Website::where('id',1)->value('comission');
        $price=($val*$comission)/100;
        $actual_price=$val+$price;
    
        return response()->json($actual_price);
        }
        
    public function edit(Product $product,$id)
    {
        $product=Product::find($id);
        $category=Category::all();
        $subcategory=Subcategory::all();
     



        return view('backend.product.edit',compact('product','subcategory','category'));
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
            'category'=>'required',
            'name'=>'required',
            'price'=>'required',
        ]);
        try {
            $category=Product::find($request->id);
            
            $category=Product::find($request->id);
            
            $file=$request->file('file');
           
            if($file){
                File::delete(public_path($category->image));
                $fname=rand().'product.'.$file->getClientOriginalExtension();
                $category->image='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/product/',$fname);
            }
            $front=$request->file('front');

            if($front){
                File::delete(public_path($category->front));
                $fname=rand().'product.'.$front->getClientOriginalExtension();
                $category->front='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $front->move(public_path().'/upload/product/',$fname);
            }
            $back=$request->file('back');

            if($back){
                File::delete(public_path($category->back));
                $fname=rand().'product.'.$back->getClientOriginalExtension();
                $category->back='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $back->move(public_path().'/upload/product/',$fname);
            }
            $left=$request->file('left');

            if($left){
                File::delete(public_path($category->left));
                $fname=rand().'product.'.$left->getClientOriginalExtension();
                $category->left='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $left->move(public_path().'/upload/product/',$fname);
            }
            $right=$request->file('right');

            if($right){
                File::delete(public_path($category->right));
                $fname=rand().'product.'.$right->getClientOriginalExtension();
                $category->right='upload/product/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $right->move(public_path().'/upload/product/',$fname);
            }

            $category->category_id=$request->category;
            $category->subcategory_id=$request->subcategory;
            $category->price=$request->price;
            $category->comission=$request->comission;
            $category->price_after_comission=$request->price_after_comission;
            $category->name=$request->name;
            $category->delivery_time=$request->delivery_time;
            $category->featured=$request->featured;
            $category->top_rated=$request->top_rated;
            $category->bestseller=$request->bestseller;
            $category->short_desc=$request->short_description;
            $category->descr=$request->long_description;
            $category->shop_id=$request->shop;
            $category->recipt=$request->recipt;

            // $category->vendor_id=Auth::user()->id;
            $category->meta_title=$request->meta_title;
            $category->meta_descr=$request->meta_description;
            $category->meta_keyword=$request->meta_keyword;
            $category->qty=$request->quantity;
            $category->Iscustomized=$request->iscustomized;
            $category->material=$request->material_used;
            $category->term=$request->term;
            $category->term=$request->term;
            $category->top_rated=$request->top_rated;
            $category->bestseller=$request->bestseller;
            $category->material=$request->material_used;



            if($category->save()){
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Product  updated',
                   
                 );
                 return redirect()->route('admin.product')->with($notification);
            }else{
                $notification=array(
                    'alert-type'=>'info',
                    'messege'=>'Product  not updated',
                   
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
    return view('backend.product.show',compact('category'));
    }


    public function deactiveproduct(){
        $product=DB::table('products')->leftjoin('shops','shops.id','products.shop_id')->join('categories','categories.id','products.category_id')->select('products.*','shops.name as sname','categories.category')->orderBy('products.id','desc')->where('products.status',0)->get();
        return view('backend.product.deactiveproduct',compact('product'));
        }


    public function addAttribute($id){
        $color=Productcolor::where('product_id',$id)->get();
        $variation=Productvariation::where('product_id',$id)->get();
$pid=$id;
        return view('backend.product.attribute',compact('color','pid','variation'));
        }
}
