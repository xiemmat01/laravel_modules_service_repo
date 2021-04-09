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

use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function () {
    Route::get('/', 'ProductController@index');
    Route::post('/', 'ProductController@store');
    Route::get('/{id}', 'ProductController@destroy');
    Route::get('edit/{id}', 'ProductController@edit');
    Route::post('edit/{id}', 'ProductController@update');
});
