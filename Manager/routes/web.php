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
Route::post('/login', 'ManagerController@managerLogin');
Route::get('/logout', 'ManagerController@managerLogout');

Route::group(['middleware' => ['web','login']], function () {
	Route::get('/', 'ManagerController@viewHomePage');
	
	Route::get('/product/new', function () {
	    return view('product-new');
	});
	Route::post('/product/new', 'ManagerController@addNewProduct');
	Route::get('/product/new', function () {
	    return view('product-new');
	});
	Route::get('/product/list', 'ManagerController@viewProductListPage');
	Route::get('/product/edit/{product_id}', 'ManagerController@viewProductEditPage');
	Route::post('/product/edit/{product_id}', 'ManagerController@editProduct');
	Route::get('/product/delete/{product_id}', 'ManagerController@deleteProduct');
	Route::get('/order/list', 'ManagerController@viewOrderListPage');
	Route::get('/order/finish/{order_id}', 'ManagerController@finishOrder');
	Route::get('/order/delete/{order_id}', 'ManagerController@deleteOrder');
});