<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
	// REGRAS DE NEGÓCIO
	// equipamento não pode ter status 'Disponível' se estiver com uma reserva
	// 	public function updateTransaction(array $attributes = [], array $options = [])
	// 	{
	// 		if ($this->status == 'Disponível' && $this->booking->count() > 0) {
	// 			$this->status = 'Indisponível';
	// 		} else {
	// 			$this->status = 'Disponível';
	// 		}

	// 		return parent::update($attributes, $options);
	//======================================================================

	// CRUD
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
		$user = Auth::user();

		$equipment = new Equipment();
		$equipment->user_id = $user->id;
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
}
