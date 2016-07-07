<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
	protected $guard = 'admins';

    protected $fillable = [
    	'type',
    	'email',
    	'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
    protected $hidden = [
        'password', 'remember_token',
    ];

}
