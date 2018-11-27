<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

    protected $table = 'buyers';
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
