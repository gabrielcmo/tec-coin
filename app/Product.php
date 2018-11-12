<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['name', 'type_id', 'value', 'description'];

    public function type() { return $this->hasOne('App\ProductType', 'type_id'); }

}
