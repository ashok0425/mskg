<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\faq;

use Illuminate\Http\Request;
use App\Models\Blogcategory;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
class BlogController  extends Controller
{

    public function index($id,$name){
  
          $blog = Blog::where('category_id',$id)->get();
        return view('frontend.blog',compact('blog'));
      }

      public function single($id){
        $blog =Blog::find($id) ;
      return view('frontend.singleblog',compact('blog'));
    }

    public function faq(){
      $blog =faq::orderBy('id','desc')->get() ;
    return view('frontend.faq',compact('blog'));
  }
}

