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


Route::group(['middleware'=> 'auth'], function () {
    Route::get('/', function () {
        return view('pages.home');
    });
    Route::get('/category', 'WEB\CategoryController@index');
    Route::get('/category/create', 'WEB\CategoryController@createCategory');
    Route::post('/category/create', 'WEB\CategoryController@storeCategory');
    Route::get('/category/delete/{id}', 'WEB\CategoryController@deleteCategory');
    Route::get('/category/{id}', 'WEB\CategoryController@update');
    Route::patch('/category/{id}', 'WEB\CategoryController@updateCategory');


    Route::get('/products', 'WEB\ProductController@index');
    Route::get('/product/create', 'WEB\ProductController@create');
    Route::post('/product/create', 'WEB\ProductController@createProduct');
    Route::get('/product/delete/{id}', 'WEB\ProductController@deleteProduct');
    Route::get('/product/{id}', 'WEB\ProductController@update');
    Route::patch('/product/{id}', 'WEB\ProductController@updateProduct');
    
    Route::get('/transaction', 'WEB\TransactionController@index');
    Route::get('/transaction/addtocart', 'WEB\TransactionController@create');
    Route::post('/transaction/addtocart', 'WEB\TransactionController@addToCart');
    Route::get('/transaction/cart/{id}', 'WEB\TransactionController@deleteItemCart');
    Route::get('/transaction/increment/{id}', 'WEB\TransactionController@qtyIncrement');
    Route::get('/transaction/decrement/{id}', 'WEB\TransactionController@qtyDecrement');
    Route::get('/transaction/cart', 'WEB\TransactionController@getCart');
    Route::post('/transaction/cart', 'WEB\TransactionController@createTransaction');
    Route::get('/transaction/detail/{id}', 'WEB\DetailTransactionController@getDetailController');
    Route::get('/logout', 'Auth\LoginController@logout');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
