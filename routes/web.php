<?php



Route::prefix("admin")->middleware(['auth',"checkAdmin"])->group(function (){
    include_once("admin.php");
});

Route::get('setLocal-{lang}', function($lang) {
    \Illuminate\Support\Facades\Session::put('lang', $lang);
    return back();
});


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
Route::get("/contact","Controller@contact");
Route::get("/shopping/{id}","Controller@shopping")->middleware("auth");
Route::post("/shopping/{id}","Controller@pshopping")->middleware("auth");
Route::get("/cart","Controller@cart")->middleware("auth");
Route::get("/deleteItemCart/{id}","Controller@deleteItemCart");
Route::get("/reduceOne/{id}","Controller@reduceOne")->middleware("auth");
Route::get("/increaseOne/{id}","Controller@increaseOne")->middleware("auth");
Route::get("/clear-cart","Controller@clearCart")->middleware("auth");
Route::get("/check-out","Controller@checkout")->middleware("auth");
Route::post("/check-out","Controller@placeOrder")->middleware("auth");
Route::get("checkout-success","Controller@checkoutSuccess");
Route::get("listOrder",'Controller@getListOrder')->middleware("auth");
Route::get("viewOrder/{id}",'Controller@getOrderPurchased')->middleware("auth");
Route::get("repurchase/{id}",'Controller@repurchase')->middleware("auth");
Route::get("search",'Controller@getSearch');
Route::post("feedback",'Controller@feedback');

Route::get("/deleteOrder/{id}",'Controller@deleteOrder')->middleware("auth");
Route::get("/deletecomplete",'Controller@deleteComplete');

Route::post("deleteItemCart/{id}",'Controller@deleteItemCart');

Auth::routes();

Route::get("test",function (){
//    $product=\App\Product::find(2);
//    $rate=\App\Feedback_product::where("product_id",$product->id)->get();
//    $rate5 =\App\Feedback_product::where("product_id",$product->id)->where("rate",5)->get();
//    if(\Illuminate\Support\Facades\Auth::check()){
//        echo \Illuminate\Support\Facades\Auth::user()->name;
//    } else {
//       echo "Guest";
//    }
    $cart = session()->get("cart");
     session()->forget("cart");

    dd(session()->get("cart"));


});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect()->to("/login");
});


Route::post("postLogin","Controller@postLogin");