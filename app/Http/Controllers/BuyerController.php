<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Buyer;
use App\User;
use App\Order;
use App\Seller;
use Auth;
class BuyerController extends Controller
{
    public function products()
    {
        $storeProducts = Product::where('type_id', Product::$TYPE_STORE)->get();
        $xeroxProducts = Product::where('type_id', Product::$TYPE_XEROX)->get();
        $canteenProducts = Product::where('type_id', Product::$TYPE_CANTEEN)->get();

        return view("buyer.products" , compact('storeProducts', 'xeroxProducts' , 'canteenProducts'));
    }

    public function balance()
    {
        if (Auth::user()->id != 2){
            return view('home');
        }
        else {
            $balance = Buyer::where('user_id',Auth::user()->id)->value('balance');
            return view("buyer.balance")->with('balance',$balance);
        }

    }

    public function orderProduct(Request $r)
    {
        $iduser = Auth::user()->id;
        $valueUser = Buyer::where('user_id', $iduser)->value('balance');
        $value = Product::where('id' , $r['id'])->value('value');
        if ($valueUser < $value) {
            return view('buyer.error');
        }
        $iduser = Auth::user()->id;
        $idbuyer = Buyer::where('user_id', $iduser)->value('id');
        // Fazer um pedido pelo id do produto
        $idseller = Seller::where('product_type_id', $r['id_product'])->value('id');
        $order = new Order;
        $order->product_id = $r['id'];
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
        $id = Auth::user()->id;
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
        return view("buyer.orders");
    }
    public function historic() {
    $idbuyer= Buyer::where('user_id', Auth::user()->id)->value('id');
    $historic = Order::where('buyer_id', $idbuyer)->get();
    return view('buyer.historic', compact('historic'));
    }
}
