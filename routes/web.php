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

Route::get('/','FrontendController@index')->name('index');

Auth::routes();
// frontend 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('brand/{id}','FrontendController@brand')->name('brand');
Route::get('promotion','FrontendController@promotion')->name('promotion');
Route::get('cart','FrontendController@cart')->name('cart');
Route::get('subcategory/{id}','FrontendController@subcategory')->name('subcategory');
Route::post('order','FrontendController@order')->name('order');
Route::get('ordersuccess','FrontendController@ordersuccess')->name('ordersuccess');
Route::get('detail/{id}','FrontendController@detail')->name('detail');
Route::get('/category/item/{id}','FrontendController@cateitem')->name('cateitem');


// Basic Routing 

  // GET Method

Route::get('hello','TestOneController@index');

   // POST Method

Route::post('hello','TestOneController@index');

//For All Method
//get, post, put, patch, delete, option)
Route::resource('test','TestTwoController');


// Route Parameters
Route::get('user/{id}','TestThreeController@show');

//Multiple Route Parameters

Route::get('hellouser/{name}/{position}/{city}','TestOneController@user');
//Backend Routs

Route::group(['middleware' => 'role:admin', 'prefix' => 'backside', 'as' => 'backside.'],function(){ 		// grouping same place routes
	Route::resource('/category','CategoryController');
	Route::resource('/subcategory','SubCategoryController');
	Route::resource('/brand','BrandController');
	Route::resource('/item/list','ItemController');
	Route::resource('/township','TownshipController');
	Route::resource('/cart','CartController');
	Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
	Route::get('/customer','CustomerController@index')->name('customer.index');
	Route::get('/order','OrderController@index')->name('order.index');
	Route::get('/order/{id}','OrderController@show')->name('order.show');
});


