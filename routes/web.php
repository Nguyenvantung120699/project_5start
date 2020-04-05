<?php



Route::prefix("admin")->middleware(['auth',"checkAdmin"])->group(function (){
    include_once("admin.php");
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
Route::get("/cart","Controller@cart")->middleware("auth");
Route::get("/clear-cart","Controller@clearCart")->middleware("auth");
Route::get("/check-out","Controller@checkout")->middleware("auth");
Route::post("/check-out","Controller@placeOrder")->middleware("auth");
Route::get("checkout-success","Controller@checkoutSuccess");
Route::get("listOrder",'Controller@getListOrder')->middleware("auth");
Route::get("viewOrder/{id}",'Controller@getOrderPurchased')->middleware("auth");
Route::get("repurchase/{id}",'Controller@repurchase')->middleware("auth");
Route::get("search",'Controller@getSearch');
Route::post("feedback",'Controller@feedback');
Auth::routes();

Route::get("test",function (){
    $product=\App\Product::find(2);
    $rate=\App\Feedback_product::where("product_id",$product->id)->get();
    $rate5 =\App\Feedback_product::where("product_id",$product->id)->where("rate",5)->get();
    dd($rate);
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect()->to("/login");
});
