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
        return view("buyer.balance");
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
        $order->save();

        return view('home');
    }

    public function profile()
    {
        // Chamar a tela de edição de perfil
        return view('buyer.edit_profile');
    }

    public function updateProfile(Request $r)
    {
        $id = $r["id"];

        $file = $r->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images', $filename);

        // Atualizar dados do perfil do usuário
        User::where('id', $id)->update(['name' => $r['name']]);
        User::where('id', $id)->update(['email' => $r['email']]);
        User::where('id', $id)->update(['image' => $filename]);
        //Modificar também o tipo de usuário????
        /* User::where('id', $id)->update(['user_type' => $r['role']]); */
        // Remover e adicionar em sua respectiva tabela?
        return view('home');
    }

    public function orders()
    {
        return redirect("buyer.orders");
    }
}
