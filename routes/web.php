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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cart','CartController');
Route::get('cart/add/{item}','CartController@addItem')->name('addItem');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
});
