<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['value', 'buyer_id', 'admin_id', 'date', 'description'];

    public function buyer() { return $this->hasOne('App\Buyer', 'buyer_id'); }
    public function admin() { return $this->hasOne('App\Admin', 'admin_id'); }
}
