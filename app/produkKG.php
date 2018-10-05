<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkKG extends Model
{
	protected $table = 'produk_kg';
	public $timestamps = true;
	protected $fillable = [
		'nama','stok','image','hargaFix_id','farmers_id','slug','deskripsi'
	];

	public function hargaFix()
	{
		return $this->belongsTo('App\hargaFix','hargaFix_id');
	}

	public function petani()
	{
		return $this->belongsTo('App\petani');
	}

}
