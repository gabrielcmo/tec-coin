@extends('layouts.app')

@section('content')
<div class="container">    
    <div align='center'>
        <img src="{{ url('images/money.gif') }}" height="200" width="200" alt="">
    </div>
    <h3>Seu saldo é de <strong> R${{ isset($balance) ? $balance : 0 }}.00 </strong></h3>
</div>
@endsection               