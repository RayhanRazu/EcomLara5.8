<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', 'FrontendController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add/product/view', 'ProductController@addproductview');
Route::post('/add/product/insert', 'ProductController@addproductinsert');
Route::get('/delete/product/{product_id}', 'ProductController@deleteproduct');
Route::get('/edit/product/{product_id}', 'ProductController@editproduct');
Route::post('/edit/product/insert', 'ProductController@editproductinsert');
