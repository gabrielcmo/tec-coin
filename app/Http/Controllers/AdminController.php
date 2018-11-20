<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Foundation\Auth\User;

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

    public function deposit()
    {
        // validar dados (?)

        // Depositar valor

        // Redirecionar para listagem de compradores

        // Mostrar mensagem de sucesso (se der tempo)
    }

    public function destroyUser($id)
    {
        // Remover o usuário da tabela mais específica (comprador, admin ou vendedor) 

        // Remover os dados da tabela usuário

        // Redirecionar para listagem de usuários

        // Mostrar mensagem de sucesso (se der tempo)
    }
    
    public function massRegister()
    {
        return redirect("admin.massregister")->with("users", $users);
    }
}
