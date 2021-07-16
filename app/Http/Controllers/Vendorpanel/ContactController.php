<?php
namespace App\Http\Controllers\Vendorpanel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contactvendor;
use Illuminate\Support\Facades\DB;
use Hash;
use App\Http\Traits\status;
class ContactController extends Controller
{
    use status;
    public function index(){
     $user=DB::table('contactvendors')->join('users','users.id','contactvendors.user_id')->where('vendor_id',Auth::user()->id)->get();
    return view('vendorpanel.cotactlist',compact('user'));
    }


}
