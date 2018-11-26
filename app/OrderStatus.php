<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public static $ORDERED = "1";
    public static $ACCEPTED = "2";
    public static $CANCELED = "3";
    
    protected $fillable = ['description'];
}
