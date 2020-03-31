<?php
Route::get('home',"AdminController@homeadmin");

//route brand
Route::get('brand',"AdminController@brand");

//route category
Route::get('category',"AdminController@category");

//route product
Route::get('product',"AdminController@product");

//route user
Route::get('user',"AdminController@user");