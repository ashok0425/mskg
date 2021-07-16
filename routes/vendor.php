<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// Route::middleware('guest:web')->group(function(){
    Route::get('/register','Vendorpanel\AuthController@index')->name('vendor.register');
    
// });
Route::post('/register','Vendorpanel\AuthController@register')->name('vendor.register');

//admin guard middleware
Route::middleware('vendor')->name('vendor.')->group(function () {
    // Admin profile 
    Route::get('/dashboard','Vendorpanel\AuthController@show')->name('dashboard');
    Route::get('/profile','Vendorpanel\AuthController@profile')->name('profile');
    Route::post('/update-profile','Vendorpanel\AuthController@update')->name('profile.update');
    Route::post('/change-password','Vendorpanel\AuthController@changePassword')->name('password');
    Route::post('/logout','Vendorpanel\AuthController@destory')->name('logout');



    // shop
    Route::get('/shop','Vendorpanel\ShopController@index')->name('shop');
    Route::get('/shop/create','Vendorpanel\ShopController@create')->name('shop.create');
    Route::post('/shop/store','Vendorpanel\ShopController@store')->name('shop.store');
    Route::get('/shop/edit/{id}','Vendorpanel\ShopController@edit')->name('shop.edit');
    Route::post('/shop/update','Vendorpanel\ShopController@update')->name('shop.update');
    Route::get('/shop/deactive/{id}/{table}','backend\CategoryController@deactive')->name('shop.deactive');
    Route::get('/shop/active/{id}/{table}','backend\CategoryController@active')->name('shop.active');
    // Route::get('/shop/delete/{id}/{table}','backend\CategoryController@destroy')->name('shop.delete');
    

    
// Product 

Route::get('/product','Vendorpanel\ProductController@index')->name('product');
Route::get('/deactiveproduct','Vendorpanel\ProductController@deactiveproduct')->name('deactiveproduct');
Route::get('/product/create','Vendorpanel\ProductController@create')->name('product.create');
Route::post('/product/store','Vendorpanel\ProductController@store')->name('product.store');
Route::get('/product/edit/{id}/','Vendorpanel\ProductController@edit')->name('product.edit');
Route::post('/product/update/','Vendorpanel\ProductController@update')->name('product.update');
Route::get('/product/show/{id}','Vendorpanel\ProductController@show')->name('product.show');
Route::get('/product/active/{id}/{table}','Vendorpanel\ProductController@active')->name('product.active');
Route::get('/product/deactive/{id}/{table}','Vendorpanel\ProductController@deactive')->name('product.deactive');
// Route::get('/product/delete/{id}/{table}','Vendorpanel\ProductController@destroy')->name('product.delete');
Route::get('/product/attribute/{id}/','Vendorpanel\ProductController@addAttribute')->name('product.attribute');

   // Product Color
Route::get('/productcolor/create/{id}','Vendorpanel\ProductcolorController@create')->name('color.create');
Route::post('/productcolor/store','Vendorpanel\ProductcolorController@store')->name('color.store');
Route::get('/productcolor/edit/{id}/','Vendorpanel\ProductcolorController@edit')->name('color.edit');
Route::post('/productcolor/edit/','Vendorpanel\ProductcolorController@update')->name('color.update');
Route::get('/product/productcolor/{id}/{table}','Vendorpanel\ProductcolorController@destroy')->name('color.delete');
Route::get('/productcolor/active/{id}/{table}','Vendorpanel\ProductcolorController@active')->name('productcolor.active');
Route::get('/productcolor/deactive/{id}/{table}','Vendorpanel\ProductcolorController@deactive')->name('productcolor.deactive');


// Product variation
Route::get('/productvariation/create/{id}','Vendorpanel\ProductvariationController@create')->name('variation.create');
Route::post('/productvariation/store','Vendorpanel\ProductvariationController@store')->name('variation.store');
Route::get('/productvariation/edit/{id}/','Vendorpanel\ProductvariationController@edit')->name('variation.edit');
Route::post('/productvariation/edit/','Vendorpanel\ProductvariationController@update')->name('variation.update');
Route::get('/product/productvariation/{id}/{table}','Vendorpanel\ProductvariationController@destroy')->name('variation.delete');
Route::get('/productvariation/active/{id}/{table}','Vendorpanel\ProductvariationController@active')->name('productvariation.active');
Route::get('/product/productvariation/{id}/{table}','Vendorpanel\ProductvariationController@deactive')->name('productvariation.deactive');
        
// memembership
Route::get('/vendor/membership/','Vendorpanel\AuthController@membership')->name('membership');

      // Report and customization
        Route::get('/product/report','Vendorpanel\ProductreportController@report')->name('report');
        Route::get('/product/report/reply/{id}','Vendorpanel\ProductreportController@reportReply')->name('report.reply');
        Route::get('/product/customize','Vendorpanel\ProductreportController@customize')->name('customize');
        Route::get('/product/report/active/{id}/{table}','Vendorpanel\ProductreportController@active')->name('productreport.active');
        Route::get('/product/report/deactive/{id}/{table}','Vendorpanel\ProductreportController@deactive')->name('productreport.deactive');
        Route::get('/product/customize/active/{id}/{table}','Vendorpanel\ProductreportController@active')->name('productcustomize.active');
        Route::get('/product/customize/deactive/{id}/{table}','Vendorpanel\ProductreportController@deactive')->name('productcustomize.deactive');

// coupon
Route::get('/coupon','Vendorpanel\CouponController@index')->name('coupon');
Route::get('/coupon/create','Vendorpanel\CouponController@create')->name('coupon.create');
Route::post('/coupon/store','Vendorpanel\CouponController@store')->name('coupon.store');
Route::get('/coupon/edit/{id}','Vendorpanel\CouponController@edit')->name('coupon.edit');
Route::post('/coupon/update','Vendorpanel\CouponController@update')->name('coupon.update');
Route::get('/coupon/show/{id}','Vendorpanel\CouponController@show')->name('coupon.show');
Route::get('/coupon/active/{id}/{table}','Vendorpanel\CouponController@active')->name('coupon.active');
Route::get('/coupon/deactive/{id}/{table}','Vendorpanel\CouponController@deactive')->name('coupon.deactive');
Route::get('/coupon/delete/{id}/{table}','Vendorpanel\CouponController@destroy')->name('coupon.delete');

         //  order 
    Route::get('/order/new','Vendorpanel\OrderController@newOrder')->name('order.new');
    Route::get('/order/export','Vendorpanel\OrderController@export')->name('order.export');

    Route::get('/order/all/list','Vendorpanel\OrderController@all')->name('order.all');

    Route::get('/order/processing','Vendorpanel\OrderController@processOrder')->name('order.processing');
    Route::get('/order/shipping','Vendorpanel\OrderController@shippingOrder')->name('order.shipping');
    Route::get('/order/deliver','Vendorpanel\OrderController@deliverOrder')->name('order.deliver');
    Route::get('/order/cancel','Vendorpanel\OrderController@cancelOrder')->name('order.cancel');
    Route::get('/order/status/{id}/{hid}','Vendorpanel\OrderController@changeOrderStatus');
    Route::post('/order/show','Vendorpanel\OrderController@show')->name('order.show');
    Route::post('/order/filter','Vendorpanel\OrderController@filter');


// contact list
Route::get('/contact/list','Vendorpanel\ContactController@index')->name('contactlist');
Route::get('/contact/active/{id}/{table}','Vendorpanel\ContactController@active')->name('contactlist.active');
Route::get('/contact/deactive/{id}/{table}','Vendorpanel\ContactController@deactive')->name('contactlist.deactive');


// Payment & Ticket
Route::get('/mypayment/list','Vendorpanel\PaymentController@index')->name('payment');
Route::get('/ticket/list/','Vendorpanel\PaymentController@ticket')->name('ticket');
Route::get('/ticket/create/','Vendorpanel\PaymentController@create')->name('ticket.create');
Route::post('/ticket/store/','Vendorpanel\PaymentController@store')->name('ticket.store');



});

// getting subcategory,modal,part using ajax 
Route::get('loaddata/{table}/{id}/{option?}','Vendorpanel\ProductController@loadData');
Route::get('comission/{val}','Vendorpanel\ProductController@productCommision');
