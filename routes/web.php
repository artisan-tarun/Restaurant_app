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
    Route::get('category/{id}/restore','CategoryController@restore')->name('category.restore');
    Route::delete('category{id}/forceDelete','CategoryController@forceDelete')->name('category.forceDelete');
    
    Route::resource('item','ItemController');
    Route::get('item/{id}/restore','ItemController@restore')->name('item.restore');
    Route::delete('item/{id}/forceDelete','ItemController@forceDelete')->name('item.forceDelete');
    
    Route::resource('user','UserController');
    Route::get('user/{id}/{role_id}/update','UserController@updateRole')->name('user.updateRole');
    
    Route::resource('role','RoleController');
    Route::get('role/{id}/restore','RoleController@restore')->name('role.restore');
    Route::delete('role/{id}/forceDelete','RoleController@forceDelete')->name('role.forceDelete');

});
