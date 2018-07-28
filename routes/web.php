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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/products','ProductController');
Route::group(['prefix'=>'products'],function(){

    Route::Resource('/{product}/reviews','ReviewController');
});
Route::get('/del',function(){
    return view('del');
});
