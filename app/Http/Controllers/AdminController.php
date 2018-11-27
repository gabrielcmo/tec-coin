<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Foundation\Auth\User;
use App\Admin;
use App\Balance;
use App\Buyer;
use App\Seller;
use App\Order;
use App\Deposit;


class AdminController extends Controller
{
    public function buyers()
    {
        $users = UserModel::where('user_type_id', UserModel::$TYPE_BUYER)->get();
        return view("admin.users" , compact('users'));
    }

    public function sellers()
    {
        $sellers = User::where('user_type_id', 3)->orWhere('user_type_id', 4)->orWhere('user_type_id', 5)->get();
        return view('admin.AllSellers', compact('sellers'));
    }

    public function deposit(Request $r)
    {
        // validar dados (?)
        // ??
        // Depositar valor
        $idbuyer = Buyer::where('id',$r['id'])->get();
        $balance = new Balance();
        $balance->value = $r['value'];
        $balance->admin_id = 1;
        $balance->buyer_id = $idbuyer;
        $balance->description = $r['description'];
        $balance->date = getdate();
        $balance->save();
        // Redirecionar para listagem de compradores
        return view('admin.buyerslist');
        // Mostrar mensagem de sucesso (se der tempo)
    }

    public function destroyUser($id)
    {
        // Remover o usuário da tabela mais específica (comprador, admin ou vendedor)
        $user_select = DB::table('User')->where('id', $id)->value('user_type_id');
        switch ($user_select) {
            case 1:
                Admin::where('user_id', $id)->delete();
                break;
            case 2:
                Buyer::where('user_id', $id)->delete();
                break;
            default:
                Seller::where('user_id',$id)->delete();
        }
        // Remover os dados da tabela usuário
            User::where('id',$id)->delete();
        // Redirecionar para listagem de usuários
            return  view('admin.userlist')->with('success','Usuarios deletados com sucesso');
        // Mostrar mensagem de sucesso (se der tempo)
    }

    public function massRegister()
    {
        $users = 0;
        return view("admin.massregister")->with("users", $users);
    }
    public function listAllUsers() {
        $AllUsers = User::where('user_type_id', 2)->get();

        foreach ($AllUsers as $user) {
            $buyer = Buyer::where("user_id", $user->id)->first();
            $buyer->balance = self::toBalance($buyer->id);
            $buyers[] = $buyer;
        }

        return view ('admin.allUser' , compact('AllUsers', 'buyers'));
    }

    public function toBalance($buyerId) {
        $deposits = Deposit::where("buyer_id", $buyerId)->get();
        $orders = Order::where(["buyer_id" => $buyerId, "status_id" => 1, "status_id" => 2])->get();
        
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
