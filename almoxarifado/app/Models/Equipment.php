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

	protected $table = 'equipment';

	protected $primaryKey = 'id';

	protected $fillable = [
		'user_id',
		'type',
		'image',
		'patrimony',
		'status',
	];

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

	// public function registerMediaConversions(Media $media = null): void
	// {
	// 	$this
	// 		->addMediaConversion('preview')
	// 		->fit(Manipulations::FIT_CROP, 300, 300)
	// 		->nonQueued();
	// }
}
