<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'dashboard/categories'], function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/{category}/show', 'CategoryController@show');
    Route::post('/store', 'CategoryController@store');
    Route::patch('/{category}', 'CategoryController@update');
    Route::delete('/{category}', 'CategoryController@destroy');
});

Route::group(['prefix' => 'dashboard/products'], function () {
    Route::get('/', 'ProductController@index')->name('api.products.index');
    Route::get('/{product}/show', 'ProductController@show')->name('api.products.show');
    Route::post('/store', 'ProductController@store')->name('api.products.store');
    Route::patch('/{product}', 'ProductController@update')->name('api.products.update');
    Route::delete('/{product}', 'ProductController@destroy')->name('api.products.destroy');
});

// Route::middleware('auth:api')->group(['prefix' => 'dashboard/users'], function () {
//     Route::get('/{id}/show', 'UserController@show');
//     Route::post('/store', 'UserController@store');
//     Route::patch('/{id}', 'UserController@update');
//     Route::delete('/{id}', 'UserController@delete');
// });
