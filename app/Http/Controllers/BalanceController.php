<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Buyer;

class BalanceController extends Controller
{
    public function credit(Request $request){
        $id = $request["id"];
        $value = $request["value"];

        $buyer = Buyer::where('user_id', $id)->first();
        $balance = $buyer->balance + $value;
        Buyer::where('user_id', $id)->update('balance', $balance);

        $newBalance = new Balance();
        $newbalance->value = $balance;
        $newbalance->date = date("Y-m-d");
        $newbalance->buyer_id = $request['buyer_id'];
        $newbalance->admin_id = $request['admin_id'];
        $newbalance->description = $request['description'];
        $newBalance->save();

        return view('home');
    }

    public function debit(Request $request){
        $id = $request["id"];
        $value = $request["value"];
        
        $buyer = Buyer::where('user_id', $id)->first();
        $balance = $buyer->balance - $value;
        Buyer::where('user_id', $id)->update('balance', $balance);

        $newBalance = new Balance();
        $newbalance->value = $balance;
        $newbalance->date = date("Y-m-d");
        $newbalance->buyer_id = $request['buyer_id'];
        $newbalance->admin_id = $request['admin_id'];
        $newbalance->description = $request['description'];
        $newBalance->save();

        return view('home');
    }
}
