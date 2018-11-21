<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Foundation\Auth\User;
use App\Admin;
use App\Balance;
use App\Buyer;
use App\Seller;
class AdminController extends Controller
{
    public function buyers()
    {
        $users = UserModel::where('role', UserModel::$TYPE_BUYER)->get();
        return redirect("admin.users")->with("users", $users);
    }

    public function sellers()
    {
        $sellers = User::where(['role' => '2', 'role' => '3', 'role' => '4'])->get();
        return redirect()->with("users", $users);
    }

    public function deposit(Request $r)
    {
        // validar dados (?)
        // ??
        // Depositar valor
        $idbuyer = Buyer::where('id',$r['id'])->get();
        $balance = new Balance;
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
            case 2:
            Buyer::where('user_id', $id)->delete();
            case 3:
            Seller::where('user_id',$id)->delete();
            case 4:
            Seller::where('user_id',$id)->delete();
            case 5:
            Seller::where('user_id',$id)->delete();
            break;
        }
        // Remover os dados da tabela usuário
            User::where('id',$id)->delete();
        // Redirecionar para listagem de usuários
            return  view('admin.userlist')->with('success','Usuarios deletados com sucesso');
        // Mostrar mensagem de sucesso (se der tempo)
    }

    public function massRegister()
    {
        return redirect("admin.massregister")->with("users", $users);
    }
}
