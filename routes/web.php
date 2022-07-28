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
Route::post('/search',[App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/contact',[App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/topic/{id}',[
    'as'=>'topic',
    'uses'=>'App\Http\Controllers\HomeController@topic',
    
                     ]);
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

Route::prefix('post')->group(function () {
    Route::get('/',[
        'as'=>'post.index',
        'uses'=>'App\Http\Controllers\PostController@index',
        
                         ]);
     Route::get('/detail/{id}',[
        'as'=>'post.detail',
        'uses'=>'App\Http\Controllers\PostController@detail',
        
                         ]);
    Route::get('/create',[
        'as'=>'post.create',
        'uses'=>'App\Http\Controllers\PostController@create'

                         ]);
    Route::post('/store',[
        'as'=>'post.store',
        'uses'=>'App\Http\Controllers\PostController@store'
                         ]);
    Route::get('/edit/{id}',[
        'as'=>'post.edit',
        'uses'=>'App\Http\Controllers\PostController@edit',
       

                         ]);
    
    
   });
   //User
   Route::prefix('user')->group(function () {
    Route::get('/user',[
        'as'=>'user.index',
        'uses'=>'App\Http\Controllers\UserController@index',
                         ]);
    Route::get('/edit/{id}',[
        'as'=>'user.edit',
        'uses'=>'App\Http\Controllers\UserController@edit',
                         ]);
    
    Route::post('/user/{id}',[
        'as'=>'user.update',
        'uses'=>'App\Http\Controllers\UserController@update',
                         ]);
    //edit post user
    Route::get('/editpost/{id}',[
        'as'=>'user.editpost',
        'uses'=>'App\Http\Controllers\UserController@editpost',
                         ]);
    Route::post('/editpost/{id}',[
        'as'=>'editpost.update',
        'uses'=>'App\Http\Controllers\UserController@postupdate',
                         ]);

     Route::get('/delete/{id}',[
        'as'=>'post.delete',
        'uses'=>'App\Http\Controllers\UserController@delete',

                         ]);
    
   });
   //Comment
   
   Route::prefix('comment')->group(function () {
    Route::post('/store/{id}',[
        'as'=>'comment.store',
        'uses'=>'App\Http\Controllers\CommentController@store'
                         ]);
     Route::get('/delete/{id}',[
        'as'=>'comment.delete',
        'uses'=>'App\Http\Controllers\CommentController@deletecomment',
                         ]);
    
   });
    
   //Slider
   
   Route::prefix('slider')->group(function () {
    Route::get('/',[
        'as'=>'slider.index',
        'uses'=>'App\Http\Controllers\SliderController@index',
                         ]);
    Route::get('/create',[
        'as'=>'slider.create',
        'uses'=>'App\Http\Controllers\SliderController@create',

                         ]);
    Route::post('/store',[
        'as'=>'slider.store',
        'uses'=>'App\Http\Controllers\SliderController@store'
                         ]);
    Route::get('/edit/{id}',[
        'as'=>'slider.edit',
        'uses'=>'App\Http\Controllers\SliderController@edit',

                         ]);
    Route::post('/slider/{id}',[
        'as'=>'slider.update',
        'uses'=>'App\Http\Controllers\SliderController@update'
                         ]);

     Route::get('/delete/{id}',[
        'as'=>'slider.delete',
        'uses'=>'App\Http\Controllers\SliderController@delete',
                         ]);
    
   });