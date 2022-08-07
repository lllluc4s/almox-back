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
}
