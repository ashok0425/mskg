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

    Route::resource('categories','CategoryController');

Route::resource('menus','MenuController');
Route::get('menus/delete/{id}','MenuController@destroy')->name('menus.delete');



Route::resource('rooms','RoomController');
Route::get('rooms/delete/{id}','RoomController@destroy')->name('rooms.delete');




Route::resource('expenses','ExpensesController');
Route::get('today-expenses','ExpensesController@today')->name('expenses.today');
Route::get('expenses/delete/{id}','ExpensesController@destroy')->name('expenses.delete');

Route::post('/opening_balance','ExpensesController@opening_balance')->name('opening.balance');
Route::get('/opening_balance','ExpensesController@opening_balance_list')->name('opening.balance');



Route::resource('carts','CartController');
Route::get('carts/delete/{id}','MenuController@destroy')->name('carts.delete');
Route::get('add_to_cart/{id}/{qty}/{room_id}','CartController@store');
Route::get('cart/delete/{id}','CartController@destroy');

Route::get('order/add/{room_id}','OrderController@store');
Route::get('cart/print/{room_id}/','CartController@print');
Route::get('cart/print_update/{room_id}/','CartController@updateIsprint');
Route::get('verify_security/{security_code}','CartController@verify_security');


Route::resource('orders','OrderController');
Route::get('today/orders','OrderController@today')->name('orders.today');
Route::get('order/edit/{ex?}/{paid?}/{discount?}/{order_id?}/{discount_type?}/{payment_type?}','OrderController@updateOrderStatus')->name('orders.edit');

Route::get('chart/orders','OrderController@chart')->name('orders.chart');
Route::get('orders/status/{id}','OrderController@status')->name('orders.status');
Route::get('/itemsell/order','OrderController@itemsell')->name('orders.itemsell');
Route::get('/itemsell/show/{category_id}','OrderController@itemsell_show')->name('itemsell.show');


Route::middleware('code')->group(function () {
Route::get('security/','CategoryController@security')->name('code');
Route::post('security/','CategoryController@securityStore')->name('code');

});
});

Route::get('invoice','OrderController@invoice')->name('orders.invoice');
