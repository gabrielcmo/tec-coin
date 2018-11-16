<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $TYPE_STORE = "";
    public static $TYPE_XEROX = "";
    public static $TYPE_CANTEEN = "";

    protected $table = 'product';
    protected $fillable = ['name', 'type_id', 'value', 'description'];

    public function type() { return $this->hasOne('App\ProductType', 'type_id'); }

}
