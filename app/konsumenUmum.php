<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsumenUmum extends Model
{
	protected $table = 'konsumen_umum';
	protected $timestamps = true;
	protected $fillable = [
		'name','nohp','email','alamat','image','user_id'
	];
}
