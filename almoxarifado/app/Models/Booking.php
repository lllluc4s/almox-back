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
		'user_name',
		'equipment_id',
		'equipment_type',
		'bookingDate',
		'transaction',
	];
	//======================================================================

	// RELACIONAMENTOS
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function equipment()
	{
		return $this->belongsTo(Equipment::class);
	}
	//======================================================================

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
	//======================================================================

	// REGRAS DE NEGÓCIO (possíveis de uso)
	// equipamento não pode ter duas transações ao mesmo tempo
	// public function checkTransaction()
	// {
	// 	if ($this->booking->count() > 0) {
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }

	// verificar se o Equipment está com status 'Disponível'
	// public function checkStatus()
	// {
	// 	$equipment = Equipment::findOrFail($this->equipment_id);

	// 	if ($equipment->status == 'Disponível') {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// realizar transação de entrada ou saída
	// public function transactionType()
	// {
	// 	if ($this->transaction == 'Entrada') {
	// 		$this->transaction = 'Saída';
	// 		$this->save();
	// 	} else {
	// 		$this->transaction = 'Entrada';
	// 		$this->save();
	// 	}
	// }
}
