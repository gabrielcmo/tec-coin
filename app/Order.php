<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'buyer_id', 'seller_id', 'status_id', 'value'];

    public function product() { return $this->hasOne('App\Product', 'id'); }
    public function buyer() { return $this->hasOne('App\Buyer', 'id'); }
    public function seller() { return $this->hasOne('App\Seller', 'id'); }
    public function status() { return $this->hasOne('App\OrderStatus', 'id'); }

    public function description() {
        return "Compra de " . $this->product->name;
    }
}