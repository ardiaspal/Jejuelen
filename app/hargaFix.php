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

	public function produkKG()
	{
		return $this->belongsTo('App\produkKG');
	}

	public function produkLahan()
	{
		return $this->belongsTo('App\produkLahan');
	}
}
