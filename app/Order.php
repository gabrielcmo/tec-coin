<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['product_id', 'buyer_id', 'seller_id', 'status_id', 'value'];

    public function product() { return $this->hasOne('App\Product', 'product_id'); }
    public function buyer() { return $this->hasOne('App\Buyer', 'buyer_id'); }
    public function seller() { return $this->hasOne('App\Seller', 'seller_id'); }
    public function status() { return $this->hasOne('App\OrderStatus', 'status_id'); }
}