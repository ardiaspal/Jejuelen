<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsumenMitra extends Model
{
	protected $table = 'konsumen_mitra';
	public $timestamps = true;
	protected $fillable = [
		'namaCv','nohp','email','alamat','image','user_id'
	];
}
