<?php

//route for admin
Route::prefix("admin")->group(function (){
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

// Route::get('/', function () {
//     return view('welcome');
//   });

Route::get("/","Controller@home");
Route::get("/home",function (){
    return view('home');
});