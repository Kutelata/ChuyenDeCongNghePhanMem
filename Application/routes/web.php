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
Route::get('/','HomeController@index')->name('index');

Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@post_login')->name('post_login');

Route::get('/register','AuthController@register')->name('register');
Route::post('/register','AuthController@post_register')->name('post_register');

Route::get('/logout','AuthController@signout')->name('logout');

Route::get('/changeinformation','AuthController@selectID')->name('selectid');
Route::post('/changeinformation','AuthController@changepassword')->name('updateinfo');

Route::get('/product_list','ProductController@product_list')->name('product_list');

Route::get('/search','ProductController@searchProductByName')->name('searchProductByName');

Route::get('/product_detail','ProductController@product_detail')->name('product_detail');

Route::get('/cart','ProductController@cart')->name('cart');

Route::get('/checkout','ProductController@checkout')->name('checkout');


