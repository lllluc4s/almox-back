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

// ROTAS DE AUTENTICAÇÃO
Route::group(["prefix" => "/auth"], function () {

	Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('login');
	Route::get('/me', 'App\Http\Controllers\LoginController@me');
});

// ROTAS DE RECURSOS
Route::group(['middleware' => 'jwt.auth'], function () {
	Route::resources([
		'users' => 'App\Http\Controllers\UserController',
		'equipments' => 'App\Http\Controllers\EquipmentController',
		'bookings' => 'App\Http\Controllers\BookingController',
	]);
});
