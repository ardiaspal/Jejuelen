<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class konsumenUmum extends Model
{
	protected $table = 'konsumen_umum';
	public $timestamps = true;
	protected $fillable = [
		'name','nohp','email','alamat','image','user_id'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}
	public function isOuner(){
		if (Auth::guest()) {
			return false;
		}
		return Auth::user()->id == $this->user_id;
	}
}
