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
                        <th scope="col"></th>
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
                        <td>
                        <div class="row">
                            <form action="user/{{$seller->id}}/delete" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
