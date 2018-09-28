<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class konsumenMitra extends Model
{
	protected $table = 'konsumen_mitra';
	public $timestamps = true;
	protected $fillable = [
		'namaCv','nohp','email','alamat','image','user_id'
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
