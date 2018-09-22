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
}
