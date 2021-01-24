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
    return view('pages.home');
});

Route::get('/category', 'WEB\CategoryController@index');
Route::get('/category/create', 'WEB\CategoryController@createCategory');
Route::post('/category/create', 'WEB\CategoryController@storeCategory');
Route::get('/category/delete/{id}', 'WEB\CategoryController@deleteCategory');
Route::get('/category/{id}', 'WEB\CategoryController@update');
Route::patch('/category/{id}', 'WEB\CategoryController@updateCategory');
