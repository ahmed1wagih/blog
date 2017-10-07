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
Route::get('/logout', 'HomeController@logout');

Route::get('home', 'HomeController@index')->name('home');

Route::get('/posts/create', 'PostController@create');
Route::post('/posts/create', 'PostController@store');
Route::get('/posts/{id}', 'PostController@index');
Route::get('/posts/{id}/edit', 'PostController@edit');
Route::post('/posts/{id}/patch', 'PostController@patch');
Route::get('/posts/{id}/destroy', 'PostController@destroy');

Route::post('/comments/create/{postid}', 'CommentController@store');
