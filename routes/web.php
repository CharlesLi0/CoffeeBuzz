<?php

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/login', 'CustomerController@customerLogin');
Route::post('/register', 'CustomerController@customerRegister');

Route::group(['middleware' => ['web','login']], function () {
	Route::get('/', 'CustomerController@viewHomePage');
	Route::get('/logout', 'CustomerController@customerLogout');
	Route::get('/order/list', 'CustomerController@viewOrderListPage');
	Route::get('/order/new', 'CustomerController@viewNewOrderPage');
	Route::get('/order/{order_id}', 'CustomerController@viewOrderDetail');
	Route::get('/order/{order_id}/add/{product_id}', 'CustomerController@addProduct');
	Route::get('/order/{order_id}/delete/{product_id}', 'CustomerController@deleteProduct');
	Route::get('/order/check-out/{order_id}', 'CustomerController@viewCheckOutPage');
	Route::post('/order/check-out/{order_id}', 'CustomerController@checkOutOrder');
	Route::get('/order/cancel/{order_id}', 'CustomerController@cancelOrder');
});