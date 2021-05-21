<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::get('market/all','MarketApiController@daftarmarket')->middleware('jwt.verify');
// http://127.0.0.1:8000/api/market/all (Get)

// Route::post('market','MarketApiController@store')->middleware('jwt.verify');
// // http://127.0.0.1:8000/api/market (Post)

Route::resource('market','MarketApiController')->except(['index','create','show'])->middleware('jwt.verify');

// Route::put('market/{id}','MarketController@update');
// Route::delete('market/{id}','MarketController@destroy');

Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');






