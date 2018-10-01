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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/user/{id}', 'UserController@show')->name('user_show');
// Route::get('/user/edit/{id}', 'UserController@edit')->name('user_edit');
// Route::post('/user/update/{id}', 'UserController@update')->name('user_update');