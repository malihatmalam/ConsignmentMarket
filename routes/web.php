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
Route::get('/daftar-market','HomeController@daftarmarket');
//http://127.0.0.1:8000/daftar-market

// Route::get('/market','MarketController@index');
// Route::get('/market/create', 'MarketController@create')->name('market.create');
// Route::post('/market','MarketController@store')->name('market.store');
// Route::get('/market/edit/{id}','MarketController@edit')->name('market.edit');
// Route::post('/market/update/{id}','MarketController@update')->name('market.update');
// Route::post('/market/delete/{id}','MarketController@destroy')->name('market.destroy');
// Route::get('/market/search', 'MarketController@search')->name('market.search');
//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
