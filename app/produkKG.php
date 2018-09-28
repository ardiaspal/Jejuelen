<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkKG extends Model
{
	protected $table = 'produk_kg';
	public $timestamps = true;
	protected $fillable = [
		'nama','stok','image','hargaFix_id','farmers_id'
	];

	public function harga_fixs()
	{
		return $this->hasMany('App\hargaFix');
	}

	public function petani()
	{
		return $this->belongsTo('App\petani');
	}

}
