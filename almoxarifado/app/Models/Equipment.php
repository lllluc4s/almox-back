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
	//======================================================================

	// RELACIONAMENTOS
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function booking()
	{
		return $this->hasMany(Booking::class);
	}
	//======================================================================

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
}
