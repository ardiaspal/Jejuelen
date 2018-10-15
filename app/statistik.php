<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statistik extends Model
{
	protected $table = 'statistik';
	public $timestamps = true;
	protected $fillable = [
		'nama','hargaBuah','hargafix_id'
	];

	public function hargaFix()
	{
		return $this->belongsTo('App\hargaFix','hargaFix_id');
	}
}
