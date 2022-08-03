<?php

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

Route::group(["prefix" => "/auth"], function () {
	// ROTAS DE AUTENTICAÇÃO
	Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('login');
	Route::get('/me', 'App\Http\Controllers\LoginController@me');
});

Route::group(['middleware' => 'jwt.auth'], function () {
	// ROTAS DE RECURSOS
	Route::resources([
		'users' => 'App\Http\Controllers\UserController',
		'equipments' => 'App\Http\Controllers\EquipmentController',
		'bookings' => 'App\Http\Controllers\BookingController',
	]);

	// ROTAS DE REGRAS DE NEGÓCIO
	Route::group(["prefix" => "/bookings"], function () {
		Route::post('transaction/{id}', 'App\Http\Controllers\BookingController@transaction');
		Route::put('/cancel/{id}', 'App\Http\Controllers\BookingController@cancelBooking');
	});
});
