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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cs', 'CsController@show');
Route::post('/cs', 'CsController@store');

Route::get('/product' ,'ProductController@show');
Route::post('/product' ,'ProductController@store');

Route::get('/orders' ,'OrdersController@show');
Route::post('/orders' ,'OrdersController@store');

Route::get('/login', 'LoginController@show');
Route::post('/login' , 'LoginController@store');