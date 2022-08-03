<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Equipment extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia;

	// ATRIBUTOS
	protected $table = 'equipment';

	protected $primaryKey = 'id';

	protected $fillable = [
		'user_id',
		'type',
		'patrimony',
		'status',
	];
	//=======================================================================

	// RELACIONAMENTOS
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function booking()
	{
		return $this->hasMany(Booking::class);
	}
	//=======================================================================

	// MÉTODOS
	// pegando o status do equipamento
	public function getStatusAttribute($value)
	{
		if ($value == 1) {
			return 'Disponível';
		} else {
			return 'Indisponível';
		}
	}

	// setando o status do equipamento
	public function setStatusAttribute($value)
	{
		if ($value == 'Disponível') {
			$this->attributes['status'] = 1;
		} else {
			$this->attributes['status'] = 0;
		}
	}
	//=======================================================================

	// SCOPES
	public function scopeType($query, $type)
	{
		if ($type) {
			$query->where('type', $type);
		}
	}

	public function scopePatrimony($query, $patrimony)
	{
		if ($patrimony) {
			$query->where('patrimony', $patrimony);
		}
	}

	public function scopeStatus($query, $status)
	{
		if ($status) {
			$query->where('status', $status);
		}
	}
	//=======================================================================

	// REGRAS DE NEGÓCIO
	// equipammento não pode ter duas transações ao mesmo tempo
	public function checkTransaction()
	{
		if ($this->booking->count() > 0) {
			return false;
		} else {
			return true;
		}
	}

	// equipamento não pode ter status 'Disponível' se estiver com uma reserva
	public function updateTransaction(array $attributes = [], array $options = [])
	{
		if ($this->status == 'Disponível' && $this->booking->count() > 0) {
			$this->status = 'Indisponível';
		} else {
			$this->status = 'Disponível';
		}

		return parent::update($attributes, $options);
	}
}
