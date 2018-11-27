<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    protected $table = 'sellers';

    protected $filliable = ['user_id','product_type_id'];
    public function user() {
        return $this->belongsTo('App\User');
    }
}
