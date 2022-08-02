<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Mostra todos os usuários.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::all();

		return response()->json($users);
	}

	/**
	 * Mostra um usuário específico.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return response()->json($user);
	}

	/**
	 * Salva um novo usuário.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->type = $request->type;
		$user->password = Hash::make($request->password);
		$user->save();

		return response()->json($user);
	}

	/**
	 * Atualiza um usuário específico.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->type = $request->type;
		$user->password = Hash::make($request->password);
		$user->save();

		return response()->json($user);
	}

	/**
	 * Deleta um usuário específico.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return response()->json($user);
	}

	// /**
	//  * Leva para a rota de criação de usuário.
	//  *
	//  * @return \Illuminate\Http\Response
	//  */
	// public function create()
	// {
	// 	return response()->json(['message' => 'Criar usuário']);
	// }

	// /**
	//  * Leva para a rota de edição de usuário.
	//  *
	//  * @param  int  $id
	//  * @return \Illuminate\Http\Response
	//  */
	// public function edit($id)
	// {
	// 	return response()->json(['message' => 'Editar usuário']);
	// }
}
