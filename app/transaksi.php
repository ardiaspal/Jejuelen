<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
	protected $table = 'transaksi';
	public $timestamps = true;
	protected $fillable = [
		'id_pesanan','id_pembayaran','totalPembayaran'
	];
	

	public function pesanan()
	{
		return $this->belongsTo('App\pesanan','id_pesanan');
	}

	public function pembayaran()
	{
		return $this->belongsTo('App\pembayaran','id_pembayaran');
	}

}
