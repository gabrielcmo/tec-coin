<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Buyer;
use App\User;
use App\Order;
use App\Deposit;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\ExtractRecord;
use App\Seller;
use App\OrderStatus;
use App\Orders;
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

    public static function extract($idBuyer = NULL)
    {

        if(isset($idBuyer)){
            $loggedBuyer = $idBuyer;
            $deposits = Deposit::where("buyer_id", $idBuyer)->get();
            $orders = Order::where(["buyer_id" => $idBuyer, "status_id" => 1, "status_id" => 2])->get();
            $displayExtract = self::toExtract($orders, $deposits);
            $balance = self::toBalance($orders, $deposits);
            return view("buyer.extract")->with(['balance' => $balance, 'displayExtract' => $displayExtract ]);
        }

        $idUser = Auth::user()->id;
        $idUserType = Auth::user()->user_type_id;

        if($idUserType == 3){
            return view('welcome');
        }
        if ($idUserType == 1) {
            return view ('welcome');       
        }
        $loggedBuyer = Buyer::where("user_id", $idUser)->first();
        $deposits = Deposit::where("buyer_id", $loggedBuyer->id)->get();
        $orders = Order::where(["buyer_id" => $loggedBuyer->id, "status_id" => 1, "status_id" => 2])->get();
        $displayExtract = self::toExtract($orders, $deposits);
        $balance = self::toBalance($orders, $deposits);
        return view("buyer.extract")->with(['balance' => $balance, 'displayExtract' => $displayExtract ]);
    }
    
    public function orderProduct(Request $r)
    {
        //Não comprar duas vezes
        $idUser = Auth::user()->id;
        $idbuyer = Buyer::where('user_id', $idUser)->value('id');

        $extract = BuyerController::extract();
        $balance = $extract["balance"];

        $value = Product::where('id' , $r['id'])->value('value');
        
        if ($balance < $value){
            return view('buyer.error');
        }

        // Fazer um pedido pelo id do produto
        $product = Product::where('id', $r['id'])->value('type_id');
        $idseller = Seller::where('product_type_id', $product)->value('user_id');

        $order = new Order();
        $order->product_id = $r['id'];
        $order->buyer_id = $idbuyer;
        $order->seller_id = $idseller;
        $order->status_id = OrderStatus::$ORDERED;
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

    private static function toExtract($orders, $deposits) {
        foreach ($orders as $order) {   
            $extractArray[] = new ExtractRecord($order->value, $order->description(), $order->created_at, "order");
        }
        
        foreach ($deposits as $deposit) {
            $extractArray[] = new ExtractRecord($deposit->value, $deposit->description, $deposit->created_at, "deposit");
        }

        if(empty($extractArray)){
            $extractArray = [];
        }
        
        usort($extractArray, function($a, $b) {
            return strcmp($a->date, $b->date);
        });

        return $extractArray;
    }

    public static function toBalance($orders, $deposits) {
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