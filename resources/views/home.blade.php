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
                            @elseif (Auth::user()->user_type_id == 2)
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
