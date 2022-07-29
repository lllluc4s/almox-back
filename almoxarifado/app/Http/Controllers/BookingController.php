<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
	/**
	 * Mostra todas as reservas.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$bookings = Booking::all();

		echo 'Lista de reservas:' . PHP_EOL;
		return response()->json($bookings);
	}

	/**
	 * Leva para a rota de criação de reserva.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return response()->json(['message' => 'Criar reserva']);
	}

	/**
	 * Salva uma nova reserva.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$booking = new Booking();
		$booking->user_id = $request->user_id;
		$booking->equipment_id = $request->equipment_id;
		$booking->date = $request->date;
		$booking->transaction = $request->transaction; // Entrada ou Saída
		$booking->save();

		echo 'Nova reserva cadastrada!' . PHP_EOL;
		return response()->json($booking);
	}

	/**
	 * Mostra uma reserva específica.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$booking = Booking::findOrFail($id);

		echo 'Reserva específica:' . PHP_EOL;
		return response()->json($booking);
	}

	/**
	 * Leva para a rota de edição de reserva.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return response()->json(['message' => 'Editar reserva']);
	}

	/**
	 * Atualiza uma reserva específica.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$booking = Booking::findOrFail($id);
		$booking->user_id = $request->user_id;
		$booking->equipment_id = $request->equipment_id;
		$booking->date = $request->date;
		$booking->transaction = $request->transaction; // Entrada ou Saída
		$booking->save();

		echo 'Reserva atualizada!' . PHP_EOL;
		return response()->json($booking);
	}

	/**
	 * Deleta uma reserva específica.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$booking = Booking::findOrFail($id);
		$booking->delete();

		echo 'Reserva deletada!' . PHP_EOL;
		return response()->json($booking);
	}
}
