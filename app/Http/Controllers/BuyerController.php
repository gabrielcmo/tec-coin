<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class BuyerController extends Controller
{
    public function products()
    {
        $storeProducts = Product::where('type_id', Product::$TYPE_STORE)->get();
        $xeroxProducts = Product::where('type_id', Product::$TYPE_XEROX)->get();
        $canteenProducts = Product::where('type_id', Product::$TYPE_CANTEEN)->get();
        
        return redirect("user.products")->with(
            ["storeProducts" => $storeProducts, "xeroxProducts" => $xeroxProducts, "canteenProducts" => $canteenProducts]
        );
    }
    
    public function balance()
    {
        return redirect("user.balance");
    }

    public function orderProduct($id)
    {
        // Fazer um pedido pelo id do produto
    }

    public function profile()
    {
        // Chamar a tela de edição de perfil
    }

    public function updateProfile()
    {
        // Atualizar dados do perfil do usuário
    }
    
    public function orders()
    {
        return redirect("user.orders");
    }
}
