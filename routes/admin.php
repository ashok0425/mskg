<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Admin Auth 
Route::middleware('guest:admin')->group(function(){
    Route::get('/login','AuthController@index')->name('login');
    Route::get('/','AuthController@index');
    Route::post('/login','AuthController@store')->name('login');
});
    
// Note :: active,deactive,destroy,method are place in Traits/status file 



//admin guard middleware
Route::middleware('auth:admin')->group(function () {
    // Admin profile 
    Route::get('/dashboard','CartController@create')->name('dashboard');
    Route::get('/profile','AuthController@profile')->name('profile');
    Route::post('/profile','AuthController@update')->name('profile.update');
    Route::get('/password','AuthController@password')->name('password');
    Route::post('/password','AuthController@password_update')->name('password');
    Route::get('/logout','AuthController@destory')->name('logout');


Route::resource('menus','MenuController');
Route::get('menus/delete/{id}','MenuController@destroy')->name('menus.delete');

Route::resource('carts','CartController');
Route::get('carts/delete/{id}','MenuController@destroy')->name('carts.delete');
Route::get('add_to_cart/{id}/{qty}','CartController@store');
Route::get('cart/delete/{id}','CartController@destroy');

Route::get('order/add/{ex}/{paid}/{discount?}','OrderController@store');
Route::resource('orders','OrderController');
Route::get('today/orders','OrderController@today')->name('orders.today');
Route::get('filter/orders','OrderController@filter')->name('orders.filter');
Route::get('chart/orders','OrderController@chart')->name('orders.chart');
Route::get('orders/status/{id}','OrderController@status')->name('orders.status');




});

Route::get('invoice','OrderController@invoice')->name('orders.invoice');
