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

Route::get('test', function () {
   	dd(Session::get('cart'));
});

Route::get('index', 'PageController@getIndex')->name('main');

Route::get('product/{id}', 'PageController@getProduct')->name('product');

Route::get('product-type/{id_type}', 'PageController@getProductType')->name('product-type');

Route::get('about', 'PageController@getAbout')->name('about');

Route::get('error', 'PageController@getError')->name('error');

Route::get('checkout', 'PageController@getCheckout')->name('checkout');

Route::get('contact', 'PageController@getContact')->name('contact');

Route::get('login', 'PageController@getLogin')->name('login');

Route::get('pricing', 'PageController@getPrice')->name('pricing');

Route::get('signup', 'PageController@getSignup')->name('signup');
Route::post('signup', 'PageController@postSignup')->name('postSignup');

Route::get('shopping-cart', 'PageController@getShoppingCart')->name('shopping-cart');

Route::get('add-to-cart/{idProduct}', 'PageController@addToCart')->name('add-cart');
Route::get('del-one-cart/{idProduct}', 'PageController@dellToCart')->name('del-one-cart');
 
//luu thong tin dat hang

Route::post('checkout', 'PageController@postCheckout')->name('postCheckout');
