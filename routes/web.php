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

Route::get('/add-to-cart/{id}','OrderController@addToCart')->name('order.addtocart');
Route::get('/cart','OrderController@showCart')->name('order.showcart');

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
