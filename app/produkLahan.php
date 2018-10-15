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

	// stok ada range
	// 1. murah
	// 2. mahal
	// tampilan harga
	// ada harga asli
	// ada data tambahan atau total administrasi admin

	// pembayaran sampai booking
	// tambah no hp

	public function petani()
	{
		return $this->belongsTo('App\petani');
	}
}
