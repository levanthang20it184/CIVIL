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
Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about',[App\Http\Controllers\About::class, 'index'])->name('about');

// Route::get('/','App\Http\Controllers\HomeController@index');
//login
Route::get('/login',[
	'as'=>'login',
	'uses'=>'App\Http\Controllers\LoginController@login'
]);
Route::post('/postlogin',[
	'as'=>'postlogin',
	'uses'=>'App\Http\Controllers\LoginController@postlogin'
]);
Route::get('/logout',[
	'as'=>'logout',
	'uses'=>'App\Http\Controllers\LoginController@logout'
]);
Route::get('/register',[
	'as'=>'register',
	'uses'=>'App\Http\Controllers\LoginController@register'
]);
Route::post('/postregister',[
	'as'=>'postregister',
	'uses'=>'App\Http\Controllers\LoginController@postregister'
]);

