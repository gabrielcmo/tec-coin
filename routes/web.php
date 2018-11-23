<?php

Auth::routes();
Route::get('/', function () { return view('welcome'); });
Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::get('/register/mass', 'AdminController@massRegister');
Route::get('/buyers', 'AdminController@buyers')->name('buyers');;
Route::post('/buyers/deposit', 'AdminController@deposit');
Route::get('/sellers', 'AdminController@sellers')->name('sellers');
Route::delete('/user/{id}', 'AdminController@destroyUser');
// Listar produtos
// Deletar produtos

// buyer
Route::get('/buyers/products', 'BuyerController@products')->name('buyerproducts');
Route::get('/buyers/balances', 'BuyerController@balance')->name('balance');
Route::post('/products/order/{id}', 'BuyerController@orderProduct');
Route::get('/user/profile', 'BuyerController@profile')->name('profileform');
Route::put('/user/profile/update', 'BuyerController@updateProfile');

// seller
Route::get('/seller/products', 'SellerController@products')->name('sellerproducts');
Route::get('/seller/products/edit', 'SellerController@editProduct');
Route::put('/seller/products/update', 'SellerController@updateProduct');
Route::delete('seller/products/{id}', 'SellerController@destroyProduct');
Route::get('/seller/products/create', 'SellerController@createProduct')->name('productsregister');
Route::post('/seller/products', 'SellerController@storeProduct');
Route::get('/seller/orders', 'SellerController@pendingOrders')->name('pendingorders');
Route::post('/seller/orders/{id}/accept', 'SellerController@acceptOrder');
Route::post('/seller/orders/{id}/deny', 'SellerController@denyOrder');