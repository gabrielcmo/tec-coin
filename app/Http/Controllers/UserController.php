<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class UserController extends Controller
{
    public function products()
    {
        $storeProducts = Product::where('type_id', Product::$TYPE_STORE)->get();
        $xeroxProducts = Product::where('type_id', Product::$TYPE_XEROX)->get();
        $canteenProducts = Product::where('type_id', Product::$TYPE_CANTEEN)->get();
        
        return redirect("user.products")->with(
            ["storeProducts" => $storeProducts, "storeProducts" => $storeProducts, "storeProducts" => $storeProducts]
        );
    }
    
    public function balance()
    {
        return redirect("user.balance");
    }
    
    public function orders()
    {
        return redirect("user.orders");
    }
}
