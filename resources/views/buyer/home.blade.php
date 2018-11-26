@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Opções</div>
                    <div class="card-body">
                        <div class="list-group">
                            @if (Auth::user()->user_type_id == 1)
                                <a href="/register" class="list-group-item list-group-item-action">Cadastro de Usuário</a>
                                <a href="/register/mass" class="list-group-item list-group-item-action">Cadastro de Usuários em Massa</a>
                                <a href="/users" class="list-group-item list-group-item-action">Consulta de Usuários</a>
                                <a href="/sellers" class="list-group-item list-group-item-action">Consultar Vendedor</a>
                            @elseif (Auth::user()->role == 1)
                                <?php
                                    $balance = isset($balance) ? $balance : null;
                                ?>
                                <h3>Seu saldo é de {{$balance}} reais.</h3>
                                <a href="/user/products" class="list-group-item list-group-item-action">Listagem de Produtos</a>
                                <a href="/user/statement" class="list-group-item list-group-item-action">Consultar Extrato</a>
                                <a href="/buyer/products" class="list-group-item list-group-item-action">Listagem de Produtos</a>
                                <a href="/buyer/balance" class="list-group-item list-group-item-action">Consultar Extrato</a>
                                <a href="/user/orders/historic" class="list-group-item list-group-item-action">Histórico de Compras</a>
                            @else
                                <a href="/products/create" class="list-group-item list-group-item-action">Cadastro de Produtos</a>
                                <a href="/products" class="list-group-item list-group-item-action">Listagem de produtos</a>
                                <a href="/orders" class="list-group-item list-group-item-action">Consultar Pedidos</a>
                                <a href="/seller/orders/historic" class="list-group-item list-group-item-action">Histórico de Compras</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
