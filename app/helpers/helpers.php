<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
 function __getAdmin(){
return Auth::guard('admin')->user();
}

function __setLink($link){

}