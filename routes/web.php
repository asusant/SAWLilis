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
	if (Auth::check()) {
		return redirect()->route('home.index');
	}else{
		return redirect()->route('login');
	}
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
// Authentication Routes...
Route::post('login', 'Auth\LoginController@login')->name('login.post');