<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	use HasFactory;

	// ATRIBUTOS
	protected $fillable = [
		'user_id',
		'equipment_id',
		'bookingDate',
		'transaction',
	];
	//=======================================================================

	// RELACIONAMENTOS
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function equipment()
	{
		return $this->belongsTo(Equipment::class);
	}
	//=======================================================================

	// MÉTODOS
	// pegando a data da reserva
	public function getBookingDateAttribute($value)
	{
		return date('d/m/Y', strtotime($value));
	}

	// setando a data da reserva
	public function setBookingDateAttribute($value)
	{
		$this->attributes['bookingDate'] = date('Y-m-d', strtotime($value));
	}
	//=======================================================================

	// SCOPES
	public function scopeBookingDate($query, $bookingDate)
	{
		if ($bookingDate) {
			$query->where('bookingDate', $bookingDate);
		}
	}

	public function scopeTransaction($query, $transaction)
	{
		if ($transaction) {
			$query->where('transaction', $transaction);
		}
	}
	//=======================================================================

	// REGRAS DE NEGÓCIO
	// realizar transação apenas se o Equipment estiver com status 'Disponível'
	public function transaction()
	{
		$equipment = Equipment::findOrFail($this->equipment_id);

		if ($equipment->status == 'Disponível') {
			$equipment->status = 'Indisponível';
			$equipment->save();
		} else {
			$equipment->status = 'Disponível';
			$equipment->save();
		}
	}

	// verificar se o Equipment está com status 'Disponível'
	public function checkStatus()
	{
		$equipment = Equipment::findOrFail($this->equipment_id);

		if ($equipment->status == 'Disponível') {
			return true;
		} else {
			return false;
		}
	}

	// realizar transação de entrada ou saída
	public function transactionType()
	{
		if ($this->transaction == 'Entrada') {
			$this->transaction = 'Saída';
			$this->save();
		} else {
			$this->transaction = 'Entrada';
			$this->save();
		}
	}

	// verificar se a transação é de entrada ou saída
	public function checkTransaction()
	{
		if ($this->transaction == 'Entrada') {
			return true;
		} else {
			return false;
		}
	}

	// verificar se a data da reserva é igual a data atual
	public function checkDate()
	{
		$today = date('Y-m-d');

		if ($this->bookingDate == $today) {
			return true;
		} else {
			return false;
		}
	}

	// alterar status do Equipment para 'Disponível' quando reserva for cancelada
	public function cancelBooking()
	{
		$equipment = Equipment::findOrFail($this->equipment_id);

		$equipment->status = 'Disponível';
		$equipment->save();
	}
}
