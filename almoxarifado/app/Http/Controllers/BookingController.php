<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
	// REGRAS DE NEGÓCIO
	// realizar transação apenas se o Equipment estiver com status 'Disponível'
	public function transaction(Request $request)
	{
		$user = User::find($request->user_id);
		$equipment = Equipment::find($request->equipment_id);

		if ($equipment->status == 'Disponível') {
			$equipment->status = 'Indisponível';

			$booking = new Booking();
			$booking->user_id = $user->id;
			$booking->user_name = $user->name;
			$booking->equipment_id = $equipment->id;
			$booking->equipment_type = $equipment->type;
			$booking->bookingDate = now();
			$booking->transaction = 'Reserva';

			$equipment->save();
			$booking->save();
		} else {
			return;
		}
	}

	// alterar status do Equipment para 'Disponível' quando reserva for cancelada
	public function cancelBooking(Request $request)
	{
		$equipmentBooking = Booking::where('equipment_id', $request->equipment_id)->latest()->first();
		$user = User::find($equipmentBooking->user_id);
		$equipment = Equipment::find($request->equipment_id);

		if ($equipment->status == 'Indisponível') {
			$equipment->status = 'Disponível';

			$booking = new Booking();
			$booking->user_id = $equipmentBooking->user_id;
			$booking->user_name = $user->name;
			$booking->equipment_id = $equipment->id;
			$booking->equipment_type = $equipment->type;
			$booking->bookingDate = now();
			$booking->transaction = 'Devolução';

			$equipment->save();
			$booking->save();
		} else {
			return;
		}
		return response()->json(['message' => 'Reserva cancelada com sucesso!']);
	}
	//======================================================================

	// CRUD
	/**
	 * Mostra todas as reservas.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$bookings = Booking::where('user_id', 'like', '%' . $request->filtro . '%')
			->orWhere('user_name', 'like', '%' . $request->filtro . '%')
			->orWhere('equipment_id', 'like', '%' . $request->filtro . '%')
			->orWhere('equipment_type', 'like', '%' . $request->filtro . '%')
			->orWhere('quantity', 'like', '%' . $request->filtro . '%')
			->orWhere('bookingDate', 'like', '%' . $request->filtro . '%')
			->orWhere('transaction', 'like', '%' . $request->filtro . '%')
			->get();
		return response()->json($bookings);
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

		return response()->json($booking);
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
		$booking->quantity = $request->quantity;
		$booking->bookingDate = $request->bookingDate;
		$booking->transaction = $request->transaction; // Entrada ou Saída
		$booking->save();

		return response()->json($booking);
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
		$booking->quantity = $request->quantity;
		$booking->date = $request->date;
		$booking->transaction = $request->transaction; // Entrada ou Saída
		$booking->save();

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

		return response()->json($booking);
	}
}
