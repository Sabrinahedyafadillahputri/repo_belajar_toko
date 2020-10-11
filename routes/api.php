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
	Route::group(['middleware' => ['api.superadmin']], function()
	{
		Route::delete('/cs/{id}', 'CsController@destroy');
		Route::delete('/product/{id}', 'ProductController@destroy');
		Route::delete('/orders/{id}', 'OrdersController@destroy');

	});

	Route::group(['middleware' => ['api.admin']], function()
	{
		Route::post('/cs', 'CsController@store');
		Route::put('/cs/{id}', 'CsController@update');

		Route::post('/product' ,'ProductController@store');
		Route::put('/product/{id}' ,'ProductController@update');

		Route::post('/orders' ,'OrdersController@store');
		Route::put('/orders/{id}' ,'OrdersController@update');
	});

	Route::get('/cs', 'CsController@show');
	Route::get('/cs/{id}', 'CsController@detail');

	Route::get('/product' ,'ProductController@show');
	Route::get('/product/{id}' ,'ProductController@detail');

	Route::get('/orders' ,'OrdersController@show');
	Route::get('/orders/{id}' ,'OrdersController@detail');

});