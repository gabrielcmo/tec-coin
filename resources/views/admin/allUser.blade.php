@extends('layouts.app')
@section('content')
<div class="container">
        <br>
        <div class="col-md-12">
            <div>
                <h1 class="display-4"><strong>Usuários cadastrados</strong></h1>
                <hr>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($AllUsers as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>?</td>
                        <td>?</td>
                        <td><a href="form-edit_user.html" class="btn btn-warning">Editar</a>  | <a href="#" class="btn btn-danger">Excluir</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
