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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'FrontEndController@index')->name('/');
Route::get('/food-category/{id}', 'FrontEndController@show')->name('food-category');
Route::post('/add-cart', 'CartController@insert')->name('add-cart');
Route::get('/cart', 'CartController@show')->name('cart');
Route::get('/remove-item/{rowId}', 'CartController@destroy')->name('remove-item');

/*--Cart routes start here--*/
Route::get('/checkout', 'CheckoutController@check')->name('checkout');
Route::get('/checkout-payment', 'CheckoutController@payment')->name('checkout-payment');
Route::post('/make-order', 'CheckoutController@order')->name('make-order');
Route::get('/order-complete', 'CheckoutController@complete')->name('order-complete');
Route::get('/stripe', 'CheckoutController@stripe')->name('stripe');
Route::get('/shipping', 'CustomerController@shipping')->name('shipping');
/*--Cart routes ends here--*/

/*--Cart stripe starts here--*/
Route::get('/stripe-payment', 'StripeController@handleGet')->name('stripe-payment');
Route::post('/stripe-payment', 'StripeController@handlePost')->name('stripe-payment');
/*--Cart stripe  ends here--*/

/*--customer routes start here--*/
Route::get('/signup', 'CustomerController@show')->name('sign-up');
Route::get('/customer-login', 'CustomerController@login')->name('customer-login');
Route::post('/customer-logout', 'CustomerController@logout')->name('customer-logout');
Route::post('/check-login', 'CustomerController@check')->name('check-login');

Route::post('/save-customer', 'CustomerController@store')->name('save-customer');
Route::post('/save-shipping', 'CustomerController@save')->name('save-shipping');
//Route::get('/login', 'CustomerController@show')->name('login');
/*--customer routes ends here--*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*--Category start here--*/
Route::get( '/category', 'CategoryController@index')->name('category');
Route::post( '/save-category', 'CategoryController@store')->name('save-category');
Route::post( '/update-category', 'CategoryController@update')->name('update-category');

Route::get( '/manage-category', 'CategoryController@create')->name('manage-category');

Route::get( '/activate-category/{id}', 'CategoryController@activate')->name('activate-category');
Route::get( '/deactivate-category/{id}', 'CategoryController@deactivate')->name('deactivate-category');
Route::get( '/delete-category/{id}', 'CategoryController@destroy')->name('delete-category');
/*--Category ends  here--*/

/*--Food starts  here--*/
Route::get( '/food', 'DishController@index')->name('food');
Route::get( '/manage-food', 'DishController@create')->name('manage-food');
Route::post( '/save-dish', 'DishController@store')->name('save-dish');
Route::post( '/update-food', 'DishController@update')->name('update-food');

Route::get( '/activate-food/{id}', 'DishController@activate')->name('activate-food');
Route::get( '/deactivate-food/{id}', 'DishController@deactivate')->name('deactivate-food');
Route::get( '/delete-food/{id}', 'DishController@destroy')->name('delete-food');
/*--Food ends  here--*/

/*--Order starts  here--*/
Route::get( '/manage-order', 'OrderController@manageOrder')->name('manage-order');
Route::get( '/view-order/{order_id}', 'OrderController@viewOrder')->name('view-order');

/*--Order ends  here--*/