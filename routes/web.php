<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', 'IndexController@index');
Route::get('/category/{id}', 'CategoryController@articles');
Route::get('/article/{id}', 'ArticleController@show');
Route::get('/author/{id}', 'AuthorController@show');

Route::get('/home', 'User\HomeController@index');
Route::get('/follow', 'User\FollowController@index');
