<?php

Route::get('/', function () { return view('welcome'); });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::get('/register/mass', 'AdminController@massRegister');
Route::get('/users', 'AdminController@users');
Route::get('/sellers', 'AdminController@sellers');

// user
Route::get('/user/products', 'UserController@products');
Route::get('/user/balance', 'UserController@balance');
Route::get('/user/orders', 'UserController@orders');

// seller
Route::get('/seller/products', 'SellerController@products');
Route::get('/seller/product/create', 'SellerController@createProduct');
Route::get('/users', 'SellerController@users');
Route::get('/seller/orders', 'SellerController@orders');