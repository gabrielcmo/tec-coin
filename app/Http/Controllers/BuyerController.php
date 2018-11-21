<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Buyer;
use App\User;
use App\Order;
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

    public function orderProduct($idbuyer , $idproduct , $idseller)
    {
        // Fazer um pedido pelo id do produto
        $value = Product::where('id' , $idproduct)->value('value')->get();
        $order = new Order;
        $order->product_id = $idproduct;
        $order->buyer_id = $idbuyer;
        $order->seller_id = $idseller;
        $order->status_id = 1;
        $order->value = $value;
        $order->save();    }

    public function profile()
    {
        // Chamar a tela de edição de perfil
        view('user.editprofile');
    }

    public function updateProfile(Request $r, $id)
    {
        // Atualizar dados do perfil do usuário
        User::where('id', $id)->update(['name' => $r['name']]);
        User::where('id', $id)->update(['email' => $r['email']]);
        //Modificar também o tipo de usuário????
        /* User::where('id', $id)->update(['user_type' => $r['role']]); */
        // Remover e adicionar em sua respectiva tabela?
    }

    public function orders()
    {
        return redirect("user.orders");
    }
}