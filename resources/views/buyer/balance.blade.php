@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">    
    <div align='center'>
        <img src="{{ url('images/money.gif') }}" height="200" width="200" alt="">
    </div>
    <h3>Seu saldo é de <strong> R${{ isset($balance) ? $balance : 0 }}.00 </strong></h3>
</div>
@endsection               
=======

    Seu saldo Atual é: {{$balance}};

@endsection
>>>>>>> ea47c3dd57a071644186dc3eae1436b0b7c99160
