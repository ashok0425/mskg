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

Route::get('auth/google','Frontend\GoogleController@redirectToGoogle');
Route::get('auth/google/callback','Frontend\GoogleController@handleGoogleCallback');


Route::get('auth/facebook', 'Frontend\FbController@redirectToFacebook');

Route::get('auth/facebook/callback','Frontend\FbController@facebookSignin');
Route::middleware(['auth:', 'verified'])->get('/', function () {
    return view('frontend.index');
})->name('/');

Route::middleware(['auth'])->group(function () {
Route::get('logout',function(){
    Auth::logout();
    Session::flush();
    $notification=array(
        'alert-type'=>'success',
        'messege'=>'Logged out successfully!',
         
     );
  
    return redirect()->route('login')->with($notification);
});
Route::get('shop/favourite/list',function(){
    return view('frontend.shoplist');
})->name('shoplist');
    
//profile
Route::get('/profile','Frontend\AuthController@index')->name('profile');
Route::post('/profile/update','Frontend\AuthController@update')->name('profile.update');
Route::post('/profile/change/password','Frontend\AuthController@changePassword')->name('profile.password');
Route::get('/profile/logout','Frontend\AuthController@destory')->name('profile.logout');

// order 
Route::get('orders/list/','Frontend\OrderController@index')->name('order');
Route::get('orders/show/{id}','Frontend\OrderController@show')->name('order.show');



// cart 
Route::get('cart/list','Frontend\CartController@index')->name('cart');
Route::get('cartqty/{val}/{id}/{price}','Frontend\CartController@update');
Route::post('product/cart/store','Frontend\CartController@store')->name('cart.store');
Route::post('/coupon','Frontend\CartController@coupon')->name('coupon');
Route::get('/coupon/delete','Frontend\CartController@CouponRemove')->name('couponremove');
Route::get('/cart/delete/{id}','Frontend\CartController@destroy')->name('cartremove');

// buy now 
Route::get('product/buy/now','Frontend\CartController@buynow')->name('buynow');


// checkout
Route::get('checkout/','Frontend\CheckoutController@index')->name('checkout');
Route::post('checkout/store','Frontend\CheckoutController@store')->name('checkout.store');
Route::get('payment/failed','Frontend\CheckoutController@failed')->name('payment.error');
Route::get('payment/success/{orderid}','Frontend\CheckoutController@success')->name('payment.success');

// wishlist 
Route::get('wishlist/list','Frontend\WishlistController@index')->name('wishlist');
Route::get('/wishlist/store/{id}','Frontend\WishlistController@store')->name('addtowishlist');
Route::get('add/cart/{id}','Frontend\WishlistController@cart')->name('addbacktocart');
Route::get('wishlist/remove/{id}','Frontend\WishlistController@destroy')->name('wishlistremove');


});


Route::get('/', function () {
    return view('frontend.index');
})->name('/');

//  track order 

Route::post('order/track/status','Frontend\OrderController@orderTrack')->name('track.my.order');


// search product using ajax
Route::get('loadproduct/{name}/{catgeory?}','Frontend\ProductController@search');

// Product details
Route::get('product/{id}/{name?}','Frontend\ProductController@productDetail')->name('product');
Route::get('loadimage/{val}/','Frontend\ProductController@loadImage');
Route::get('loadprice/{val}/{vid}','Frontend\ProductController@loadPrice');
Route::post('product/cart/coupon','Frontend\CartController@vendorCoupon')->name('vendorcoupon');
Route::get('coupon/remove/','Frontend\CartController@vendorCouponRemove')->name('vendor.coupon.remove');
Route::post('product/report/','Frontend\ProductController@report')->name('product.report');
Route::post('product/customize/','Frontend\ProductController@customize')->name('product.customize');


// product rating 

Route::post('product/rating/store','Frontend\ProductController@ratingStore')->name('product.rating.store');
Route::get('product/review/edit/{id}','Frontend\ProductController@ratingEdit')->name('product.rating.edit');
Route::post('product/rating/update','Frontend\ProductController@ratingUpdate')->name('product.rating.update');
Route::get('product/review/delete/{id}','Frontend\ProductController@ratingDestroy')->name('product.rating.delete');



// store 
Route::get('store/','Frontend\ProductController@productStore')->name('store');
Route::get('store/search/','Frontend\ProductController@productSearch')->name('store.search');
Route::get('store/product/{id}/{name}','Frontend\ProductController@productCategory')->name('store.category');
Route::get('store/product/type/{id}/{name}','Frontend\ProductController@productSubcategory')->name('store.subcategory');


Route::get('filterproduct/ajax','Frontend\ProductController@filterProductAjax');

// faq 
Route::get('faq','Frontend\BlogController@faq')->name('faq');


// blog
Route::get('blog','Frontend\BlogController@index')->name('blog');
Route::get('blogdetail/{id}','Frontend\BlogController@single')->name('blog.detail');

// subscriber 
Route::post('subscriber/store','Frontend\ContactController@subscriber')->name('subscriber');

// contact 
Route::get('contact/','Frontend\ContactController@index')->name('contact');
Route::post('contact/store','Frontend\ContactController@store')->name('contact.store');
Route::post('subscribe/store','Frontend\ContactController@subscribe')->name('subscribe.store');

// shop 
Route::get('shop/{id}/{name}','Frontend\ShopController@shop')->name('shop');
Route::post('shop/contact/store','Frontend\ContactController@contactvendorstore')->name('shop.contact.store');

Route::post('shop/rating/store','Frontend\ShopController@ratingStore')->name('shop.rating.store');
Route::get('shop/review/edit/{id}','Frontend\ShopController@ratingEdit')->name('shop.rating.edit');
Route::post('shop/rating/update','Frontend\ShopController@ratingUpdate')->name('shop.rating.update');
Route::get('shop/review/delete/{id}','Frontend\ShopController@ratingDestroy')->name('shop.rating.delete');
Route::get('shop/add/favourite/{id}','Frontend\ShopController@favourite')->name('shop.add.favourite');
Route::get('shop/remove/favourite/{id}','Frontend\ShopController@remove')->name('shop.remove.favourite');



// pages 
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/gallery', function () {
    return view('frontend.gallery');
})->name('gallery');

Route::get('/form', function () {
    return view('frontend.form');
})->name('form');

Route::get('/term-condition', function () {
    return view('frontend.term');
})->name('term');

Route::get('/price', function () {
    return view('frontend.price');
})->name('price');

Route::get('/privacy-policy', function () {
    return view('frontend.privacy');
})->name('privacy');



