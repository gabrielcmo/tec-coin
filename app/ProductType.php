<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['user_id','product_type_id'];

    public function products() { return $this->hasMany('App\Product'); }
}