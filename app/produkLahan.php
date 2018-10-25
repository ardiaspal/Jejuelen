<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkLahan extends Model
{
	protected $table = 'produk_lahan';
	public $timestamps = true;
	protected $fillable = [
		'nama','stokAwal','stokAkhir','image','farmers_id','masatanam','perkiraanPanen','slug','deskripsi','harga'
	];
	
	public function petani()
	{
		return $this->belongsTo('App\petani','farmers_id');
	}
	public function pesanans()
	{
		return $this->hasMany('App\pesanan');
	}
}
