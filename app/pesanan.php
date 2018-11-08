<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
	protected $table = 'pesanan';
	public $timestamps = true;
	protected $fillable = [
		'user_id', 'produkLahan_id', 'produkKg_id', 'jumlah', 'status', 'hargaTot'
	];

	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
	public function produkKG(){
		return $this->belongsTo('App\produkKG','produkKg_id');
	}
	public function produkLahan(){
		return $this->belongsTo('App\produkLahan','produkLahan_id');
	}

	function transaksi()
	{
		return $this->hasOne('App\transaksi');
	}
}
