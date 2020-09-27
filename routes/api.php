<?php

use Illuminate\Http\Request;

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

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function()
{
Route::get('/cs', 'CsController@show');
Route::post('/cs', 'CsController@store');

Route::get('/product' ,'ProductController@show');
Route::post('/product' ,'ProductController@store');
Route::put('/product/{id}' ,'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');

Route::get('/orders' ,'OrdersController@show');
Route::get('/orders/{id}' ,'OrdersController@detail');
Route::post('/orders' ,'OrdersController@store');
Route::put('/orders/{id}' ,'OrdersController@update');
Route::delete('/orders/{id}', 'OrdersController@destroy');

});