<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Buyer;
use App\User;
use App\Order;
use App\Deposit;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use App\ExtractRecord;
use App\Seller;

class BuyerController extends Controller
{
    public function products()
    {
        $storeProducts = Product::where('type_id', Product::$TYPE_STORE)->get();
        $xeroxProducts = Product::where('type_id', Product::$TYPE_XEROX)->get();
        $canteenProducts = Product::where('type_id', Product::$TYPE_CANTEEN)->get();

        return view("buyer.products" , compact('storeProducts', 'xeroxProducts' , 'canteenProducts'));
    }

    public function extract()
    {
<<<<<<< HEAD
        $id = Auth::user()->id;
        $user = Buyer::where('user_id', $id)->first();
        $balance = $user->balance;

        return view('buyer.balance')->with(compact('balance'));
=======
        // Pegar todos os valores que foram adicionados à conta do comprador (usuário logado)
        $loggedBuyer = Buyer::where("user_id", Auth::user()->id)->first();
        $deposits = Deposit::where("buyer_id", $loggedBuyer->id)->get();

        // Pegar todas as compras realizadas por esse usuário cujo status seja igual a (1) Ordered ou 2 (Accepted)
        $orders = Order::where(["buyer_id" => $loggedBuyer->id, "status_id" => 1, "status_id" => 2])->get();
        
        /* Mergear os dois arrays em um único array com o seguinte padrão:

            // Para uma compra:
            value: 5
            description:"Compra de Coxinha"
            date:14/11/2018
            type:saida

            // Para um recebimento:
            value: 30
            description:"Melhor nota da turma"
            date:14/11/2018
            type:entrada
        */
        $displayExtract = self::toExtract($orders, $deposits);

        // Pegar o saldo do usuário
        $balance = self::toBalance($orders, $deposits);
        
        return view("buyer.extract")->with(['balance' => $balance, 'displayExtract' => $displayExtract ]);
>>>>>>> ea47c3dd57a071644186dc3eae1436b0b7c99160
    }

    public function orderProduct(Request $r)
    {
        $iduser = Auth::user()->id;
        $valueUser = Buyer::where('user_id', $iduser)->value('balance');
        $value = Product::where('id' , $r['id'])->value('value');
        
        if ($valueUser < $value) return view('buyer.error');
        
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

    private function toExtract($orders, $deposits) {
        foreach ($orders as $order) {   
            $extractArray[] = new ExtractRecord($order->value, $order->description(), $order->created_at, "order");
        }
        
        foreach ($deposits as $deposit) {
            $extractArray[] = new ExtractRecord($deposit->value, $deposit->description, $deposit->created_at, "deposit");
        }
        
        usort($extractArray, function($a, $b) {
            return strcmp($a->date, $b->date);
        });

        return $extractArray;
    }

    public function toBalance($orders, $deposits) {
        $balance = 0;
        foreach ($orders as $order) {
            $balance -= $order->value;
        }
        
        foreach ($deposits as $deposit) {
            $balance += $deposit->value;
        }

        return $balance;
    }
}