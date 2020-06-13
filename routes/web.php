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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/panel', 'Authors\HomeController@index')->name('dashboard');

Route::get('/panel/post', 'Authors\PostController@index')->name('post.index');
Route::post('/panel/post', 'Authors\PostController@store')->name('post.store');
Route::get('/panel/post/{id}/edit', 'Authors\PostController@edit')->name('post.edit');
Route::delete('/panel/post/{id}', 'Authors\PostController@destroy')->name('post.delete');

Route::get('/panel/category', 'Authors\CategoryController@index')->name('category.index');
Route::post('/panel/category', 'Authors\CategoryController@store')->name('category.store');
Route::get('/panel/category/{id}/edit', 'Authors\CategoryController@edit')->name('category.edit');
Route::delete('/panel/category/{id}', 'Authors\CategoryController@destroy')->name('category.delete');

