<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hargaFix extends Model
{

	protected $table = 'harga_fix';
	public $timestamps = true;
	protected $fillable = [
		'nama','hargaBuah'
	];

	public function produkKGs()
	{
		return $this->hasMany('App\produkKG');
	}

	public function produkLahans()
	{
		return $this->hasMany('App\produkLahan');
	}
}
