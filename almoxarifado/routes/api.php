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

// Route::get('/login', function () {
// 	$credentials = [
// 		'email' => 'admin@admin.com',
// 		'password' => '1234'
// 	];

// 	if (Auth::attempt($credentials)) {
// 		request()->session()->regenerate();

// 		return auth()->user();
// 	}

// 	abort(401);
// });

Route::get('/users', 'App\Http\Controllers\UserController@index')->middleware('auth:sanctum');

Route::get('/equipments', 'App\Http\Controllers\EquipmentController@index')->middleware('auth:sanctum');

Route::get('/bookings', 'App\Http\Controllers\BookingController@index',)->middleware('auth:sanctum');
