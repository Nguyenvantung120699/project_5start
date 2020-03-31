<?php

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

Route::get("/","Controller@home");
Route::get("/danh-muc/{id}","Controller@listingCategory");
Route::get("/thuong-hieu/{id}","Controller@listingBrand");
Route::get("/san-pham/{id}","Controller@product");
Route::get("/contact","ontroller@contact");
Route::get("/shopping/{id}","Controller@shopping")->middleware("auth");
Route::get("/cart","Controller@cart")->middleware("auth");
Route::get("/clear-cart","Controller@clearCart")->middleware("auth");
Route::get("/check-out","Controller@checkout")->middleware("auth");
Route::post("/check-out","Controller@placeOrder")->middleware("auth");
Route::get("checkout-success","Controller@checkoutSuccess")->middleware("auth");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/log-out',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect()->to("/login");
});
