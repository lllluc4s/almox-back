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

		echo 'Lista de equipamentos:' . PHP_EOL;
		return response()->json($equipments);
	}

	/**
	 * Leva para a rota de criação de equipamento.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return response()->json(['message' => 'Criar equipamento']);
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
		$equipment->brand = $request->brand;
		$equipment->patrimony = $request->patrimony;
		$equipment->status = $request->status;
		$equipment->save();

		echo 'Novo equipamento cadastrado!' . PHP_EOL;
		return response()->json($equipment);
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

		echo 'Equipamento encontrado!' . PHP_EOL;
		return response()->json($equipment);
	}

	/**
	 * Leva para a página de edição de um equipamento.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return response()->json(['message' => 'Editar equipamento']);
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

		echo 'Equipamento atualizado!' . PHP_EOL;
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

		echo 'Equipamento deletado!' . PHP_EOL;
		return response()->json(['message' => 'Equipamento deletado!']);
	}
}
