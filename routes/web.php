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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');
Route::get('home/cart','CardController@index')->name('user.cart')->middleware('auth');
Route::get('home/cart/add/{product}','CardController@add')->name('addTocart')->middleware('auth');
Route::get('home/cart/update/{product}','CardController@update')->name('card.update')->middleware('auth');
Route::get('home/cart/delete/{product}','CardController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/checkout-form', 'CardController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('orders','OrderController')->middleware('auth');
Route::resource('shop','ShopController')->middleware('auth');

Route::get('/checkout/{order}','CheckoutController@getCheckoutExpress')->name('checkout');
Route::get('/checkout/success/{order}','CheckoutController@getCheckoutExpressSuccess')->name('checkout.success');
Route::get('/checkout/cancel','CheckoutController@getCheckoutExpressCancel')->name('checkout.cancel');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
