<?php

Auth::routes();
Route::get('/', function () { return view('welcome'); });
Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::get('/register/mass', 'AdminController@massRegister');
Route::get('/buyers', 'AdminController@buyers')->name('buyers');;
Route::post('/buyers/deposit', 'AdminController@deposit');
Route::get('/sellers', 'AdminController@sellers')->name('sellers');
Route::post('/user/delete', 'AdminController@destroyUser');
Route::get('/users', 'AdminController@listAllUsers');
Route::get('/deposit', 'AdminController@deposit');
// Listar produtos
// Deletar produtos

// buyer
Route::get('user/orders/historic', 'BuyerController@historic');
Route::get('/buyer/products', 'BuyerController@products')->name('buyerproducts');
Route::get('/buyer/balance', 'BuyerController@extract')->name('extract');
Route::post('/products/order', 'BuyerController@orderProduct');
Route::get('/user/profile', 'BuyerController@profile')->name('profileform');
Route::put('/user/profile/update', 'BuyerController@updateProfile');
Route::get('/user/view/profile/', function(){
    return view('buyer.profile');
})->name('profile');

// seller
Route::get('/seller/products', 'SellerController@products')->name('sellerproducts');
Route::post('/seller/products/edit', 'SellerController@editProduct');
Route::post('/seller/products/update', 'SellerController@updateProduct');
Route::get('seller/products/{id}', 'SellerController@destroyProduct');
Route::get('/products/create', 'SellerController@createProduct')->name('productsregister');
Route::post('/seller/products/store', 'SellerController@storeProduct');
Route::get('/seller/orders', 'SellerController@pendingOrders')->name('pendingorders');
Route::post('/seller/orders/{id}/accept', 'SellerController@acceptOrder');
Route::post('/seller/orders/{id}/cancel', 'SellerController@cancelOrder');
Route::get('/seller/orders/historic', 'SellerController@historic');