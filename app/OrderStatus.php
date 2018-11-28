<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public $table = 'order_status';

    public static $ORDERED = "1";
    public static $ACCEPTED = "2";
    public static $CANCELED = "3";
    
    protected $fillable = ['description'];

    public function orders() { return $this->hasMany('App\Orders'); }
}