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

//cart and checkout
Route::get('/Add-Cart/{id}/{sizeId}','ProductController@AddCart')->name('AddCart');
Route::get('/Delete-Item-Cart/{id}','ProductController@DeleteItemCart')->name('DeleteItemCart');
Route::get('/Delete-Item-List-Cart/{id}','ProductController@DeleteListItemCart')->name('DeleteItemListCart');
Route::get('/List-Carts','ProductController@ViewListCart')->name('ViewListCart');
Route::get('/Save-Item-List-Cart/{id}/{quantity}','ProductController@SaveListItemCart')->name('UpdateListCart');
Route::get('/Checkout/','ProductController@Checkout')->name('checkout');
Route::post('/Checkout/','ProductController@post_checkout')->name('checkout_success');

