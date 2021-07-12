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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/edit_prod/{id}', 'IndexController@editProduct')->name('edit_prod');
Route::patch('/update_prod/{id}', 'IndexController@updateProduct')->name('update_prod');
Route::post('/sales/add', 'SalesController@addSale')->name('sales.add');
Route::get('/sales/create', 'SalesController@create')->name('sales.create');
Route::post('/sales', 'SalesController@store')->name('sales.store');
Route::resource('/sales', 'SalesController');
