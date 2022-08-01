<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
	/**
	 * Mostra todos os equipamentos.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$equipments = Equipment::all();

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
		$input = $request->all();
		$equipment = Equipment::create($input);

		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			$equipment->addMediaFromRequest('image')->toMediaCollection('images');
		}
		return redirect()->route('equipments.index');


		// $equipment = new Equipment();
		// $equipment->type = $request->type;
		// $equipment->brand = $request->brand;
		// $equipment->patrimony = $request->patrimony;
		// $equipment->status = $request->status;
		// $equipment->save();

		// return response()->json($equipment);
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
		$equipment->brand = $request->brand;
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

	// /**
	//  * Leva para a rota de criação de equipamento.
	//  *
	//  * @return \Illuminate\Http\Response
	//  */
	// public function create()
	// {
	// 	return response()->json(['message' => 'Criar equipamento']);
	// }

	// /**
	//  * Leva para a página de edição de um equipamento.
	//  *
	//  * @param  int  $id
	//  * @return \Illuminate\Http\Response
	//  */
	// public function edit($id)
	// {
	// 	return response()->json(['message' => 'Editar equipamento']);
	// }
}
