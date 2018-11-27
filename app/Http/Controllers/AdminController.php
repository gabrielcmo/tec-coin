<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Foundation\Auth\User;
use App\Admin;
use App\Balance;
use App\Buyer;
use App\Seller;
use App\Deposit;
use App\Order;
use App\UserType;
use App\Http\Controllers\BuyerController;

class AdminController extends Controller
{
    public static function registerUsers($id, $typeuser) {
        if($typeuser == 1){
            $user = new Admin();
            $user->user_id =  $id;
            $user->save();

            return view('home');
        }elseif($typeuser == 2){
            $user = new Buyer();
            $user->user_id =  $id;
            $user->save();

            $idBuyer = Buyer::orderBy('id', 'desc')->value('id');
            $extract = BuyerController::extract($idBuyer);
            $balance = $extract["balance"];

            return view('home');
        }elseif($typeuser == 3 || $typeuser == 4 || $typeuser == 5){
            $user = new Seller();
            $user->user_id =  $id;

            if($typeuser == 3){
                $typeuser = 1;
            }elseif($typeuser == 4){
                $typeuser = 2;
            }else{
                $typeuser = 3;
            }
            $user->product_type_id = $typeuser;
            $user->save();

            return view('home');
        }

        return false;
    }
    public function buyers()
    {
        $users = UserModel::where('user_type_id', UserModel::$TYPE_BUYER)->get();
        return view("admin.users" , compact('users'));
    }

    public function sellers()
    {
        $sellers = User::where('user_type_id', 3)->get();
        return view('admin.AllSellers', compact('sellers'));
    }

    public function depositView(){
        return view('admin.formdeposit');
    }

    public function deposit(Request $r)
    {
        $deposit = new Deposit();
        $deposit->value = $r['value'];
        $deposit->admin_id = $r["admin_id"];
        $deposit->buyer_id = $r["buyer_id"];
        $deposit->date = now();
        $deposit->description = $r["description"];
        $deposit->save();
        // Redirecionar para listagem de compradores
        $AllUsers = User::where('user_type_id', 2)->get();
        return view('admin.allUser')->with(compact('AllUsers'));
        // Mostrar mensagem de sucesso (se der tempo)
    }

    public function destroyUser($id)
    {
        $usertypeid = UserModel::where('id', $id)->value('user_type_id');
        $tipo = $usertypeid == UserModel::$TYPE_BUYER ? 2 : 3;
        $username = UserModel::where('id', $id)->value('name');
        UserModel::where('id', $id)->delete();
        if ($tipo == 2){
          return redirect('/users');
        }
        else{
          return redirect('/sellers');
        }
    }

    public function massRegister()
    {
        $users = 0;
        return view("admin.massregister")->with("users", $users);
    }
    public function listAllUsers() {
        $AllUsers = User::where('user_type_id', 2)->get();
        return view ('admin.allUser' , compact('AllUsers'));
    }
}
