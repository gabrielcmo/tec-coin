<?php use App\ProductType; ?>
<?php use App\Seller; ?>
@extends('layouts.app')
@section('content')
<div class="container">
        <br>
        <div class="col-md-12">
            <div>
                <h1 class="display-4"><strong>Vendedores cadastrados</strong></h1>
                <hr>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo de Vendedor</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sellers as $seller)
                <?php $tipodeusuario = Seller::where('user_id',$seller->id)->value('product_type_id') ?> 
                <?php $tipoproduto = ProductType::where('id', $tipodeusuario)->value('description') ?>
                    <tr>
                        <th scope="row">{{$seller->id}}</th>
                        <td>{{$tipoproduto}}</td>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->email}}</td>
                        <td>?</td>
                        <td><a href="#" class="btn btn-warning">Editar</a>  | <a href="#" class="btn btn-danger">Excluir</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
