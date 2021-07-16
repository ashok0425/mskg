<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
// use App\Models\Product;
use App\Mail\customize;
use App\Models\Productvariation;
use Illuminate\Support\Facades\DB;
use App\Models\Productcolor;
use Illuminate\Support\Facades\Auth;
use App\Models\Productreview;
use Illuminate\Support\Facades\Mail;
use App\Mail\reportproduct;
use Session;
class ProductController extends Controller
{
    public function search($name,$category=null){

        if($category !==null){
            $products=Product::where('name','LIKE','%'.$name. '%')->where('category_id',$category)->limit(7)->where('status',1)->get();

        }else{
        $products=Product::where('name','LIKE','%'.$name. '%')->limit(7)->get();

        }
        $data="";
        if(count($products)>0){

        foreach($products as $cat){
          $data.=" <div class='card-header py-2 border-bottom'>
        <a href='";
        //  $data.=route('product.detail',['id'=>$cat->id,'product_name'=>$cat->product_name]);
         $data.="' style='color:black;width:100%;display:block;' class='filters'>";
          $data.= $cat->name;
          $data.="</a>
          </div>";

    }
   

}else{
  $data.=" <div class='card-header py-2 border-bottom'>
<a href='";
//  $data.=route('product.detail',['id'=>$cat->id,'product_name'=>$cat->product_name]);
 $data.="' style='color:red;width:100%;'>";
  $data.= 'No product found';
  $data.="</a>
  </div>";
}
return response()->json($data);
}







public function productDetail($id,$name){
 

try {
    $product=DB::table('products')->join('categories','products.category_id','categories.id')->select('products.*','categories.category')->where('products.id',$id)->where('products.status',1)->first();
    $variation=Productvariation::where('product_id',$id)->get();
    $color=Productcolor::where('product_id',$id)->get();
    if($product){
        return view('frontend.productdetail',compact('product','variation','color'));

    }

} catch (\Throwable $th) {
    $notification=array(
        'alert-type'=>'error',
        'messege'=>'Something went wrong.Please try again later',
        
     );
     return redirect()->back()->with($notification);
}
}






public function loadPrice($id,$vid){
    $price=Productvariation::find($id);
    if(session()->has('vendorcoupon') && session()->get('vendorcoupon')['vendor_id']==$vid ){
$total=($price->price_after_comission-$price->price_after_comission*session::get('vendorcoupon')['discount']/100);
    }else{
$total=$price->price_after_comission;
    }

   

    return response()->json($total);
}


public function loadImage($id){
 $image=Productcolor::find($id);
 return response()->json(asset($image->image));
}


public function ratingStore(Request $request){
$request->validate([
    'rating'=>'required',


]);
try {
    if(Auth::check()){
        $review=new Productreview;
        $review->user_id=Auth::user()->id;
        $review->product_id=$request->product_id;

        $review->rating=$request->rating;
        $review->feedback=$request->review;
$review->save();
$notification=array(
  'messege'=>'Thank you for your Feedback',
  'alert-type'=>'success'
   );
 return Redirect()->back()->with($notification);

      }else{
          $notification=array(
              'messege'=>'Please Login',
              'alert-type'=>'error'
               );
          return redirect()->route('login')->with($notification);
      }
} catch (\Throwable $th) {
    $notification=array(
        'messege'=>'Something went wrong.Please try again later',
        'alert-type'=>'error'
         );
       return Redirect()->back()->with($notification);
}
}



public function ratingEdit(Productreview $review,$id)
{
    $re=Productreview::find($id);
    return response()->json($re);

}


public function ratingUpdate(Request $request)
{
    $id=$request->vid;
    $re=Productreview::find($id);
    $re->feedback=$request->feedback;
    $re->save();
    $notification=array(
        'messege'=>'Your feedback updated',
        'alert-type'=>'success'
         );
    return redirect()->back()->with($notification);

}

public function ratingDestroy(Productreview $review,$id)
{
    $re=Productreview::find($id);
    $re->delete();
    $notification=array(
        'messege'=>'Your review was deleted',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
}


public function productStore(Request $request){

    $product=DB::table('products')->where('status',1)->paginate(24);
    return view('frontend.store',compact('product'));
}


public function productSearch(Request $request){
    
    $product=DB::table('products')->where('name','LIKE','%'.$request->search. '%')->where('status',1)->get();
    return view('frontend.store',compact('product'));
}



public function productCategory(Request $request,$id,$category){
    
    $product=DB::table('products')->where('category_id',$id)->where('status',1)->paginate(24);
    return view('frontend.store',compact('product'));
}

public function productSubcategory(Request $request,$id,$category){
    
    $product=DB::table('products')->where('subcategory_id',$id)->where('status',1)->paginate(24);
    return view('frontend.store',compact('product'));
}






public function filterProductAjax(Request $request){

    $category_all="SELECT products.*,shops.address FROM products LEFT JOIN shops ON shops.id=products.shop_id WHERE products.status=1 ";
 if(isset($request->min) || isset($request->max)  && !empty($request->min) && !empty( $request->max)){

   $category_all .= " AND price_after_comission BETWEEN $request->min AND $request->max";


 }
 
 if(isset($request->category )){
     $ex=implode("','",$request->category);
  $category_all .= " AND  category_id IN ('".$ex."')";

 }
 if(isset($request->brand )){
    $ex=implode("','",$request->brand);
 $category_all .= " AND  subcategory_id IN ('".$ex."')";

}

if(isset($request->recipt )){
    $ex=implode("','",$request->recipt);
 $category_all .= " AND  recipt IN ('".$ex."')";

}
if(isset($request->address )){
    $ex=implode("','",$request->address);
 $category_all .= " AND  shops.address IN ('".trim($ex)."')";

}
if(isset($request->order)&&$request->order==1){

  $category_all .= "   ORDER BY id DESC ";
 
 
 }
if(isset($request->order)&&$request->order==2){

     $category_all .= "   ORDER BY id ASC ";

    }
    if(isset($request->order)&&$request->order==3){

         $category_all .= "  ORDER  BY  name  ASC ";

        }
        if(isset($request->order)&&$request->order==4){

             $category_all .= "   ORDER BY name DESC ";

            }
           
            
$cat=DB::select($category_all);
    $data='';
    foreach($cat as $item){

$data.=	"<div class='col-xl-2 col-lg-4 col-md-4 col-6'>
<div class='card card-sm card-product-grid'>";
if (Auth::check()){

    $w=DB::table('wishlists')->where('user_id',Auth::user()->id)->where('product_id',$item->id)->first();

                   if ($w){
                    $data.="<a class='text-right heart'><i class='fas fa-heart'></i></a>";

                   }else{
                $data.="<a class='text-right heart' href='". route('addtowishlist',['id'=>$item->id])."'><i class=' far fa-heart'></i></a>";
                   
    }}else{
        $data.="<a class='text-right heart' href='". route('addtowishlist',['id'=>$item->id])."'><i class=' far fa-heart'></i></a>";
                   
        }
        $data.="<a href='".route('product',['id'=>$item->id,'name'=>$item->name])."' class='img-wrap'> <img src='". asset($item->image)."'> </a>
    <figcaption class='info-wrap '>
        <a href='".route('product',['id'=>$item->id,'name'=>$item->name])."' class='title'>". $item->name ."</a>

        <ul class='rating-stars my-0 py-0'>";
      $rev=DB::table('productreviews')->where('product_id',$item->id)->avg('rating');
      $total=DB::table('productreviews')->where('product_id',$item->id)->get();
      for($i=1;$i<=ceil($rev);$i++){
        $data.=	"<span class='fa fa-star rstar' ></span>";
         }

        for($j=1;$j<=5-ceil($rev);$j++) {
            $data.=	"<span class='far fa-star dstar' ></span>";
         }
         $data.=	"</ul>
        <div class='price mt-1'>". __getPriceunit() .' '. number_format($item->price_after_comission)."</div>
    </figcaption>
</div>
</div>";
        }   
return response()->json($data);


  }


public function report(Request $request){
if(Auth::check()){
   try {
     $report=array();
$report['product_id']=$request->id;
$report['vendor_id']=$request->vid;
$report['user_id']=Auth::user()->id;
$report['reason']=$request->reason;
DB::table('productreports')->insert($report);
$data=array(
    'report'=>$request->reason,
);
Mail::to(Auth::user()->email)->send(new reportproduct($data));
$email=DB::table('users')->where('id',$request->vid)->value('email');
   
Mail::to($email)->send(new reportproduct($data));
    $notification=array(
        'messege'=>'Your report hasbeen approved.we will get back to you soon.',
        'alert-type'=>'success'
         );
       return Redirect()->back()->with($notification);
   } catch (\Throwable $th) {
   
    $notification=array(
        'messege'=>'Something went wrong.Please try again later.',
        'alert-type'=>'error'
         );
       return Redirect()->back()->with($notification);
   }


}else{
       return redirect()->route('login');
}
}




public function customize(Request $request){
    if(Auth::check()){
       try {
         $report=array();
    $report['product_id']=$request->id;
    $report['vendor_id']=$request->vid;
    $report['user_id']=Auth::user()->id;
    $report['descr']=$request->msg;

    $file=$request->file('file');
           
            if($file){
                // File::delete(__getAdmin()->profile_photo_path);
                $fname=rand().'product.'.$file->getClientOriginalExtension();
                $report['image']='upload/product/customize/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/product/customize/',$fname);
            }
    DB::table('productcustomizes')->insert($report);
  
    $data=array(
        'report'=>$request->msg,
    );
    Mail::to(Auth::user()->email)->send(new customize($data));
    $email=DB::table('users')->where('id',$request->vid)->value('email');
   
    Mail::to($email)->send(new customize($data));

    
        $notification=array(
            'messege'=>'Your Request for product personilization has been placed',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
       } catch (\Throwable $th) {
       
        $notification=array(
            'messege'=>'Something went wrong.Please try again later.',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);
       }
    
    
    }else{
           return redirect()->route('login');
    }
    }





}

