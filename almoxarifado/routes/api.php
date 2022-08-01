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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// 	return $request->user();
// });

// Route::get('/users', 'App\Http\Controllers\UserController@index')->middleware('auth:sanctum');
// Route::get('/users/{id}', 'App\Http\Controllers\UserController@show')->middleware('auth:sanctum');
// Route::post('/users', 'App\Http\Controllers\UserController@store')->middleware('auth:sanctum');
// Route::put('/users/{id}', 'App\Http\Controllers\UserController@update')->middleware('auth:sanctum');
// Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy')->middleware('auth:sanctum');

// Route::get('/equipments', 'App\Http\Controllers\EquipmentController@index')->middleware('auth:sanctum');
// Route::get('/equipments/{id}', 'App\Http\Controllers\EquipmentController@show')->middleware('auth:sanctum');
// Route::post('/equipments', 'App\Http\Controllers\EquipmentController@store')->middleware('auth:sanctum');
// Route::put('/equipments/{id}', 'App\Http\Controllers\EquipmentController@update')->middleware('auth:sanctum');
// Route::delete('/equipments/{id}', 'App\Http\Controllers\EquipmentController@destroy')->middleware('auth:sanctum');

// Route::get('/bookings', 'App\Http\Controllers\BookingController@index',)->middleware('auth:sanctum');
// Route::get('/bookings/{id}', 'App\Http\Controllers\BookingController@show')->middleware('auth:sanctum');
// Route::post('/bookings', 'App\Http\Controllers\BookingController@store')->middleware('auth:sanctum');
// Route::put('/bookings/{id}', 'App\Http\Controllers\BookingController@update')->middleware('auth:sanctum');
// Route::delete('/bookings/{id}', 'App\Http\Controllers\BookingController@destroy')->middleware('auth:sanctum');

// Route::resources([
// 	'users' => 'App\Http\Controllers\UserController',
// 	'equipments' => 'App\Http\Controllers\EquipmentController',
// 	'bookings' => 'App\Http\Controllers\BookingController',
// ]);

// Route::get('/login', function () {
// 	$credentials = [
// 		'email' => 'lucas@lucas.com',
// 		'password' => '1234'
// 	];

// 	if (Auth::attempt($credentials)) {
// 		request()->session()->regenerate();

// 		return auth()->user();
// 	}

// 	abort(401);
// });

// Rota para csrf cookie (necessário para o Sanctum)
Route::get('/sanctum/csrf-cookie', function (Request $request) {
	return response()->json(['csrf' => csrf_token()]);
});

Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::resources([
		'users' => 'App\Http\Controllers\UserController',
		'equipments' => 'App\Http\Controllers\EquipmentController',
		'bookings' => 'App\Http\Controllers\BookingController',
	]);
});
