<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function users()
    {
        $users = UserModel::where('role', UserModel::$TYPE_USER)->get();
        return redirect("admin.users")->with("users", $users);
    }

    public function sellers()
    {
        $sellers = User::where(['role' => '2', 'role' => '3', 'role' => '4'])->get();
        return redirect()->with("users", $users);
    }

    public function massRegister()
    {
        return redirect("admin.massregister")->with("users", $users);
    }
}
