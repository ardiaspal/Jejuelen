<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class petani extends Model
{
	protected $table = 'farmers';
	public $timestamps = true;
	protected $fillable = [
		'name','nohp','alamat','email','nik','status','jenisKelamin','agama','kewarganegaraan','ttl','image','fotoKtp','user_id'
	];
	public function user(){
		return $this->belongsTo('App\User');
	}

	public function produkKGS()
	{
		return $this->hasMany('App\produkKG');
	}
	
	public function produkLahans()
	{
		return $this->hasMany('App\produkLahan');
	}

	public function isOuner(){
		if (Auth::guest()) {
			return false;
		}
		return Auth::user()->id == $this->user_id;
	}
}
