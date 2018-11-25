@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div>
        <h1 class="display-4"><strong>Alterar dados</strong></h1>
        <hr>
    </div>
    <br>
    <form method="POST" action="/user/profile/update">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" aria-describedby="nome" placeholder="Nome novo" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"  value="{{ Auth::user()->email }}">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Nova senha">
                    <br>
                    <input type="password" class="form-control" id="senhaConf" placeholder="Confirmar senha">
                </div>
            </div>
            <div class="col-md-6 text-center">
                <?php $img = Auth::user()->image ?>
                <img class="rounded-circle" src="{{ url("images/$img") }}" height="200" width="200"
                    alt="">
                    <br><br>
                <input type="file" name="foto" id="foto">
            </div>
        </div>
        <button type="submit" class="btn btn-purple text-light">Atualizar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection