<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static $TYPE_ADMIN = "1";
    public static $TYPE_BUYER = "2";
    public static $TYPE_SELLER = "3";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'user_type_id', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function name() {
	    return $this->hasOne('App\Buyer');
    }
    public function name2()
    {
        return $this->hasOne('App\Seller');
    }
}

