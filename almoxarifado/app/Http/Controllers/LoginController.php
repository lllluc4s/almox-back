<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{

	/**
	 * Handle an authentication attempt.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 *
	 */
	public function authenticate(Request $request)
	{
		$credentials = $request->only('email', 'password');

		if ($token = $this->guard()->setTTL(60 * 60 * 1)->attempt($credentials)) {
			return $this->respondWithToken($token);
		}

		return response()->json(['error' => 'Unauthorized'], 401);
	}

	public function logout()
	{
		Auth::logout();
		return response()->json([
			'status' => 'success',
			'message' => 'Successfully logged out',
		]);
	}

	public function refresh()
	{
		return response()->json([
			'status' => 'success',
			'user' => Auth::user(),
			'authorisation' => [
				'token' => Auth::refresh(),
				'type' => 'bearer',
			]
		]);
	}

	/**
	 * Get the token array structure.
	 *
	 * @param  string $token
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function respondWithToken($token)
	{
		$user = auth()->user();

		return response()->json([
			'user' => $user,
			'access_token' => $token,
			'token_type' => 'bearer',
			'expires_in' => $this->guard()->factory()->getTTL() * 60
		]);
	}

	public function me()
	{
		$user = $this->guard()->user();

		return $user;
	}

	public function guard()
	{
		return Auth::guard('api');
	}
}
