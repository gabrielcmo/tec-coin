<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['product_id', 'buyer_id', 'status_id', 'value'];
}
