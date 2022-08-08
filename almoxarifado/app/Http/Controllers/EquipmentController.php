<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
	// CRUD
	// /**
	//  * Mostra todos os equipamentos.
	//  *
	//  * @return \Illuminate\Http\Response
	//  */
	// public function index()
	// {
	// 	$equipments = Equipment::all();

	// 	return response()->json($equipments);
	// }

	/**
	 * Mostra todas as reservas.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$equipments = Equipment::where('type', 'like', '%' . $request->filtro . '%')
			->orWhere('patrimony', 'like', '%' . $request->filtro . '%')
			->orWhere('status', 'like', '%' . $request->filtro . '%')
			->get();
		return response()->json($equipments);
	}

	/**
	 * Mostra um equipamento específico.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$equipment = Equipment::findOrFail($id);

		return response()->json($equipment);
	}

	/**
	 * Salva um novo equipamento.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$equipment = new Equipment();
		$equipment->type = $request->type;
		$equipment->patrimony = $request->patrimony;
		$equipment->status = $request->status;
		$equipment->save();

		return response()->json($equipment);
	}

	/**
	 * Atualiza um equipamento específico.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$equipment = Equipment::findOrFail($id);
		$equipment->type = $request->type;
		$equipment->patrimony = $request->patrimony;
		$equipment->status = $request->status;
		$equipment->save();

		return response()->json($equipment);
	}

	/**
	 * Deleta um equipamento específico.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$equipment = Equipment::findOrFail($id);
		$equipment->delete();

		return response()->json(['message' => 'Equipamento deletado!']);
	}
}
