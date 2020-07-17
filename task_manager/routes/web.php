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
// Tạo 1 nhóm route với tiền tố customer
Route::prefix('customer')->group(function () {
    Route::get('index','CustomerController@index');
  
    Route::get('create','CustomerController@create');
  
    Route::post('store','CustomerController@store');
  
    Route::get('{id}/show','CustomerController@show');
  
    Route::get('{id}/edit', 'CustomerController@edit');
  
    Route::patch('{id}/update','CustomerController@update');
  
    Route::delete('{id}','CustomerController@delete');
  });
  