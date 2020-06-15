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
Route::get('/api/post', 'Api\PostController@index')->name('api.post.index');
Route::get('/api/post/topviews', 'Api\PostController@topViews')->name('api.post.topviews');
Route::get('/api/post/{slug}', 'Api\PostController@show')->name('api.post.show');
Route::get('/api/category', 'Api\PostController@category')->name('api.post.category');
Route::get('/api/post/category/{id}', 'Api\PostController@byCategory')->name('api.post.category');
Route::get('/api/post/author/{id}', 'Api\PostController@byAuthor')->name('api.post.author');
Route::get('/api/post/search/{title}', 'Api\PostController@searchPost')->name('api.post.search');

Auth::routes(['verify' => true]);

Route::get('/panel', 'Authors\HomeController@index')->name('dashboard');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/panel/user', 'Authors\UserController@index')->name('user.index');
Route::post('/panel/user', 'Authors\UserController@store')->name('user.store');
Route::get('/panel/user/{id}/edit', 'Authors\UserController@edit')->name('user.edit');
Route::delete('/user/post/{id}', 'Authors\UserController@destroy')->name('user.delete');

Route::get('/panel/post', 'Authors\PostController@index')->name('post.index');
Route::post('/panel/post', 'Authors\PostController@store')->name('post.store');
Route::get('/panel/post/{id}/edit', 'Authors\PostController@edit')->name('post.edit');
Route::delete('/panel/post/{id}', 'Authors\PostController@destroy')->name('post.delete');

Route::get('/panel/category', 'Authors\CategoryController@index')->name('category.index');
Route::post('/panel/category', 'Authors\CategoryController@store')->name('category.store');
Route::get('/panel/category/{id}/edit', 'Authors\CategoryController@edit')->name('category.edit');
Route::delete('/panel/category/{id}', 'Authors\CategoryController@destroy')->name('category.delete');

