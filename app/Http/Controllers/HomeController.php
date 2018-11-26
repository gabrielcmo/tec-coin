<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        if($user == 1){
            return view('admin.home');
        }elseif($user == 2){
            return view('buyer.home');
        }elseif($user >= 3 || $user <= 5){
            return view('seller.home');
        }

        return false;
    }
}