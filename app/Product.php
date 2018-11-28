<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $TYPE_CANTEEN = "1";
    public static $TYPE_XEROX = "2";
    public static $TYPE_STORE = "3";

    protected $fillable = ['name', 'type_id', 'value', 'description'];

    public function type() { return $this->hasOne('App\ProductType'); }
} 