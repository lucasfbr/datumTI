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


Route::group(['prefix' => '/'], function (){

    Route::get('/', 'BannerController@index');
    Route::get('/show/{id}', 'BannerController@show');
    Route::get('/create', 'BannerController@create');
    Route::post('/store', 'BannerController@store');
    Route::get('/edit/{id}', 'BannerController@edit');
    Route::post('/update/{id}', 'BannerController@update');
    Route::get('/delete/{id}', 'BannerController@delete');
    Route::post('/search', 'BannerController@search');

});