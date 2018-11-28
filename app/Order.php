<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'buyer_id', 'seller_id', 'status_id', 'value'];

    public function product() {return $this->belongsTo('App\Product'); }
    public function buyer() { return $this->belongsTo('App\Buyer'); }
    public function seller() { return $this->belongsTo('App\Seller'); }
    public function status() { return $this->belongsTo('App\OrderStatus'); }
    
    public function description() { return "Compra de " . $this->product->name; }
}