<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	
	use Notifiable;
	public $timestamps = true;
	protected $fillable = [
		'password','level','username','email','status_id','status'
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	public function statusBeli()
	{
		return $this->hasMany('App\statusBeli');
	}
	public function petanis()
	{
		return $this->hasMany('App\petani');
	}
	public function mitras()
	{
		return $this->hasMany('App\konsumenMitra');
	}
	public function umums()
	{
		return $this->hasMany('App\konsumenUmum');
	}
	public function pesanans()
	{
		return $this->hasMany('App\pesanan');
	}
	public function isAdmin()
	{
		if ($this->level == 0) {
			return true;
		} else {
			return false;
		}  
	}
}
