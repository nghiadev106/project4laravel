<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index')->name('home.index');

Route::get('/shop','HomeController@shop')->name('home.shop');
Route::get('/shop','HomeController@shop')->name('home.shop');
Route::get('/product/{slug}/{id}','HomeController@detail')->name('home.detail');

Route::get('/add-to-cart/{id}','CartController@addToCart')->name('cart.addtocart');
Route::post('/add-cart','CartController@addCart')->name('cart.addcart');
Route::get('/cart','CartController@showCart')->name('cart.showcart');
Route::post('/cart/increaseQuantity/{rowId}','CartController@increaseQuantity')->name('cart.increase');
Route::post('/cart/decreaseQuantity/{rowId}','CartController@decreaseQuantity')->name('cart.decrease');
Route::post('/cart/delete/{rowId}','CartController@delete')->name('cart.delete');

Route::group(['prefix'=>'admin'],function(){
	Route::get('/','AdminController@index')->name('admin.dashboard');
	Route::get('/file','AdminController@file')->name('admin.file');
	Route::resources([
		'category'=>'CategoryController',
		'product'=>'ProductController',
		'account'=>'AccountController',
		'banner'=>'BannerController',
		'blog'=>'BlogController',
		'order'=>'OrderController'		
	]);
});
