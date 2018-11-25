@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div>
        <h1 class="display-4"><strong>Seu perfil</strong></h1>
        <hr>
    </div>
    <br>

    <div class="row">

        <div align='center' class="col-8">
            <?php $img = Auth::user()->image ?>
            <img src="{{ url("images/$img") }}" height="140" width="140" alt=""><br><br>
        </div>

        <div class="col-6">
            <h2>Nome</h2>
            <h3>{{ Auth::user()->name }}</h3><br><br>
        </div>
        
        <div class="col-6">
            <h2>Email</h2>
            <h4>{{ Auth::user()->email }}</h4><br><br>
        </div>

        <div class="col-6">
            <h2>Tipo de conta</h2>
            <h4>
                @if (Auth::user()->user_type_id == 1)
                    Administrador
                @elseif(Auth::user()->user_type_id == 2)
                    Comprador
                @elseif (Auth::user()->user_type_id == 3)
                    Vendedor - Cantina
                @elseif (Auth::user()->user_type_id == 4)
                    Vendedor - Xerox
                @elseif (Auth::user()->user_type_id == 5)
                    Vendedor - Lojinha
                @endif
            </h4>
        </div>

        <h3><a class="col-6" href="{{route('profileform')}}">Alterar configurações</a></h3>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection