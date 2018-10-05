<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkLahan extends Model
{
	protected $table = 'produk_lahan';
	public $timestamps = true;
	protected $fillable = [
		'nama','stok','image','hargaFix_id','farmers_id','masatanam','perkiraanPanen','slug','deskripsi'
	];

	// stok ada range
	// 1. murah
	// 2. mahal
	// tampilan harga
	// ada harga asli
	// ada data tambahan atau total administrasi admin

	// pembayaran sampai booking
	// tambah no hp


	public function hargaFix()
	{
		return $this->belongsTo('App\hargaFix','hargaFix_id');
	}

	public function petani()
	{
		return $this->belongsTo('App\petani');
	}
}
