<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petani extends Model
{
	protected $table = 'farmers';
	public $timestamps = true;
	protected $fillable = [
		'name','nohp','alamat','email','almat','nik','status','jenisKelamin','agama','kewarganegaraan','ttl','image','fotoKtp','user_id'
	];
}
