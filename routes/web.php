<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

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
Route::get('/contact-us','HomeController@contact')->name('home.contact');
Route::get('/about-us','HomeController@about')->name('home.about');


Route::get('/category/{slug}/{id}','HomeController@category')->name('home.category');

Route::get('/product/{slug}/{id}','HomeController@detail')->name('home.detail');
Route::get('/blog/{slug}/{id}','HomeController@blog_detail')->name('home.blog_detail');

Route::get('/add-to-cart/{id}','CartController@addToCart')->name('cart.addtocart');
Route::post('/add-cart','CartController@addCart')->name('cart.addcart');
Route::get('/cart','CartController@showCart')->name('cart.showcart');
Route::post('/cart/increaseQuantity/{rowId}','CartController@increaseQuantity')->name('cart.increase');
Route::post('/cart/decreaseQuantity/{rowId}','CartController@decreaseQuantity')->name('cart.decrease');
Route::post('/cart/delete/{rowId}','CartController@delete')->name('cart.delete');

Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::post('/send-checkout','CheckoutController@send_checkout')->name('send_checkout');
Route::get('/checkout-success','CheckoutController@checkout_success')->name('checkout.success');

Route::prefix('admin')->group(static function() {
    Route::middleware(['auth:sanctum','verified','authadmin'])->group(static function () {
		Route::get('/','AdminController@index')->name('admin.dashboard');
		Route::get('/file','AdminController@file')->name('admin.file');
		Route::get('/order_detail/{id}','OrderController@detail')->name('order.detail');
		Route::get('/order-print/{order_id}','OrderController@print_order')->name('order.print');
		Route::get('/print-order//{order_id}','OrderController@print')->name('print');
		Route::resources([
			'category'=>'CategoryController',
			'product'=>'ProductController',
			'account'=>'AccountController',
			'banner'=>'BannerController',
			'blog'=>'BlogController',
			'order'=>'OrderController'
		]);
    });
});
Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('user.dashboard');

// Route::middleware(['auth:sanctum','verified'])->group(function(){
//     Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
// });

//For Admin
// Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
//     Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
//     Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
//     Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory') ;
//     Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
//     Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
//     Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
//     Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

//     Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
//     Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
//     Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

//     Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
//     Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

// });

