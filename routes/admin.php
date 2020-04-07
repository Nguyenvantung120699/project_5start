<?php
Route::get('home',"AdminController@homeadmin");

//route brand
Route::get('brand',"AdminController@brand");
Route::get('brand/create',"AdminController@brandCreate");
//route xử lý upload và crop image
// Route::post('brand/upload', 'AdminController@postUpload');
// Route::post('brand/crop', 'AdminController@postCrop');

Route::post('brand/store',"AdminController@brandStore");
Route::get('brand/edit/{id}',"AdminController@brandEdit");
Route::post('brand/update/{id}',"AdminController@brandUpdate");
Route::get('brand/delete/{id}',"AdminController@brandDestroy");
//route category
Route::get('category',"AdminController@category");
Route::get('category/create',"AdminController@categoryCreate");
Route::post('category/store',"AdminController@categoryStore");
Route::get('category/edit/{id}',"AdminController@categoryEdit");
Route::post('category/update/{id}',"AdminController@categoryUpdate");
Route::get('category/delete/{id}',"AdminController@categoryDestroy");
//route product
Route::get('product',"AdminController@products");
Route::get('product/create',"AdminController@productCreate");
Route::post('product/store',"AdminController@productStore");
Route::get('product/edit/{id}',"AdminController@productEdit");
Route::post('product/update/{id}',"AdminController@productUpdate");
Route::get('product/delete/{id}',"AdminController@productDestroy");

//route user
Route::get('user',"AdminController@user");
Route::get('user/create',"AdminController@userCreate");
Route::post('user/store',"AdminController@userStore");
Route::get('user/edit/{id}',"AdminController@userEdit");
Route::post('user/update/{id}',"AdminController@userUpdate");
Route::get('user/delete/{id}',"AdminController@userDestroy");