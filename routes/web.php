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
})->name('home');

Route::group(['prefix' => 'question1',  'as' => 'question1.'], function()
{
    Route::get('/', function ()
    {
    	return view('question1.index');
    })->name('index');

    Route::get('/form',function ()
    {
    	return view('question1.form');
    })->name('form-store');

    Route::post('/store', 'DataStoreLoadController@store')->name('store');
	Route::get('/load', 'DataStoreLoadController@load')->name('load');
});

Route::group(['prefix' => 'question2',  'as' => 'question2.'], function()
{
    Route::get('/', function ()
    {
    	return view('question2.index');
    })->name('index');
});

Route::group(['prefix' => 'question3',  'as' => 'question3.'], function()
{
    Route::get('/', 'StoreController@index')->name('index');
    Route::post('/buy', 'StoreController@store')->name('buy');
});
