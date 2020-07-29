<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', 'ProductController@showProduct')->name('home');
Route::get('/products/{product}/show', 'ProductController@showSingle')->name('products.show');
Route::get('/checkout', 'ProductController@showCheckout')->name('checkout');
Route::post('/addCart', 'CartController@addCart')->name('products.addCart');
Route::post('/updateCart', 'CartController@updateCart')->name('products.updateCart');

Route::get('/clearCart', 'CartController@clearCart')->name('products.clearCart');
Route::get('/removeCart/{id}', 'CartController@removeCart')->name('products.removeCart');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/users', 'AdminController@users')->name('dashboard.users');
    Route::get('/categories', 'AdminController@categories')->name('dashboard.categories');
    Route::get('/products', 'AdminController@products')->name('dashboard.products');
});

Route::group(['prefix' => 'home'], function () {
    // Route::get('/', 'HomeController@index')->name('home');
    // Route::get('/users', 'HomeController@users')->name('home.users');
    // Route::get('/categories', 'HomeController@categories')->name('home.categories');
    // Route::get('/products', 'HomeController@products')->name('home.products');
});
