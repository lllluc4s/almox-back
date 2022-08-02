<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

	Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('login');
	Route::get('/me', 'App\Http\Controllers\LoginController@me');
});

Route::group(['middleware' => 'jwt.auth'], function () {
	Route::resources([
		'users' => 'App\Http\Controllers\UserController',
		'equipments' => 'App\Http\Controllers\EquipmentController',
		'bookings' => 'App\Http\Controllers\BookingController',
	]);
});

// Route::resource('/users', 'App\Http\Controllers\UserController')->middleware('jwt.auth');
// Route::resource('/equipments', 'App\Http\Controllers\EquipmentController')->middleware('jwt.auth');
// Route::resource('/bookings', 'App\Http\Controllers\BookingController')->middleware('jwt.auth');
