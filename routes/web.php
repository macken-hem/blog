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

Route::get('/','PostsController@index')->middleware('auth');
Route::get('/posts/{post}','PostsController@show')->where('post', '[0-9]+')->middleware('auth');
Route::get('/posts/create','PostsController@create')->middleware('auth');
Route::post('/posts','PostsController@store');
Route::get('/posts/{post}/edit','PostsController@edit')->middleware('auth');
Route::patch('/posts/{post}','PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::post('/posts/{post}/comments','CommentsController@store');
Route::delete('/posts/{post}/comments/{comment}','CommentsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
