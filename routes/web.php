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

Route::get('/admin/stores', 'Admin\\StoreController@index');
Route::get('/admin/stores/create', 'Admin\\StoreController@create');
Route::post('/admin/stores/store', 'Admin\\StoreController@store')->name('create.store');

Route::resource('products', 'Admin\\ProductController');

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
