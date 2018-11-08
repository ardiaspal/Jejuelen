<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
	protected $table = 'pembayaran';
	public $timestamps = true;
	protected $fillable = [
		'image','norekening'
	];
	

	public function transaksi()
	{
		return $this->hasMany('App\transaksi');
	}

}
