@extends('layouts.app')

@section('content')

 <div class="container">
    <br>
    <div class="col-md-12">
        <div>
            <h1 class="display-4"><strong>Bem vindo, {{ Auth::user()->name }}.</strong></h1>
            <p class="lead">Você tem {{ count($orders) }} {{count($orders) > 1 ? 'pedidos' : 'pedido' }}</p>
            <hr>
        </div>
        <br>

        @if($orders->isEmpty())

            <h1>Não há pedidos pendentes ツ</h1>

        @else

            <h2><i class="material-icons">style</i><em> Pedidos pendentes</em></h2>
            <br>
            <div>

            @for ($i = 0; $i < count($orders); $i++)

                @if($i == 0 || $i % 4 == 0)
                    <div class="row">
                @endif

                    <div class="col-md-3 col-sm-4">
                        <div class="card" style="width: 270px;">
                            <img class="card-img-top" src="{{url('/images/placeholder.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $orders[$i]->product->name }}</h5>
                                <p class="card-text lead">description }}</p>
                                <p><img src="{{url('/images/logo.png')}}" width="20px"> <strong>{{ $orders[$i]->value }}</strong></p>
                                <a href="#" class="btn btn-danger">Recusar</a>
                                <a href="#" class="btn text-light roxo-1">Aceitar</a>
                            </div>
                        </div>
                    </div>

                @if(($i + 1) % 4 == 0)
                    </div>
                    <br>
                @endif

            @endfor
            
        @endif

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection