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
Route::get('/user/view/profile/', function(){
    return view('buyer.profile');
})->name('profile');

// seller
Route::group(['prefix' => 'seller'], function () {
    Route::get('products', 'SellerController@products')->name('sellerproducts');
    Route::post('products/edit', 'SellerController@editProduct');
    Route::put('products/update', 'SellerController@updateProduct');
    Route::get('products/{id}', 'SellerController@destroyProduct');
    Route::get('products/create', 'SellerController@createProduct')->name('productsregister');
    Route::post('products', 'SellerController@storeProduct');
    Route::get('orders', 'SellerController@pendingOrders')->name('pendingorders');
    Route::post('orders/{id}/accept', 'SellerController@acceptOrder');
    Route::post('orders/{id}/deny', 'SellerController@denyOrder');
});