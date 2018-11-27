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
                        <th scope="col">Saldo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($buyers as $buyer)
                    <tr>
                        <th scope="row">{{$buyer->id}}</th>
                        <td>{{$buyer->user->name}}</td>
                        <td>{{$buyer->user->email}}</td>
                        <td>{{$buyer->balance}}</td>
                        <td><a href="form-edit_user.html" class="btn btn-warning">Editar</a>  | <a href="#" class="btn btn-danger">Excluir</a></td>
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