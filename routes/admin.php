<?php
Route::get('home',"AdminController@homeadmin");

//route brand
Route::get('brand',"AdminController@brand");
Route::get('brand/create',"AdminController@brandCreate");
Route::get('brand/edit',"AdminController@brandEdit");
//route category
Route::get('category',"AdminController@category");
Route::get('category/create',"AdminController@categoryCreate");
Route::get('category/edit',"AdminController@categoryEdit");
//route product
Route::get('product',"AdminController@products");
Route::get('product/create',"AdminController@productCreate");
Route::get('product/edit',"AdminController@productEdit");

//route user
Route::get('user',"AdminController@user");
Route::get('user/create',"AdminController@userCreate");
Route::get('user/edit',"AdminController@userEdit");