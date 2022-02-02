<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ModalController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest:web')->group(function(){
    Route::get('/login','AuthController@index')->name('login');
    Route::get('/','AuthController@index');
    Route::post('/login','AuthController@store')->name('login');
});
    
Route::middleware('auth')->group(function () {

    // Admin profile 
    Route::get('/dashboard','OrderController@Emptypage')->name('dashboard');
    Route::get('/profile','AuthController@profile')->name('profile');
    Route::post('/profile','AuthController@update')->name('profile.update');
    Route::get('/password','AuthController@password')->name('password');
    Route::post('/password','AuthController@password_update')->name('password');
    Route::get('/logout','AuthController@destory')->name('logout');

    
   Route::get('load-order','OrderController@index');
   Route::get('order-status/{id}','OrderController@status')->name('orders.status');

    

});
