<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusBeli extends Model
{
	protected $table = 'status_beli';
	public $timestamps = true;
	protected $fillable = [
		'mitra','umum','petani'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
