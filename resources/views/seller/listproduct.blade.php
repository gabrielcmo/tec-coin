@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div>
        <h1 class="display-4"><strong>Produtos</strong></h1>
        <hr>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listproducts as $item)
                <tr>
                    <td><img class="rounded-circle" src="{{ url("images/$item->image") }}" width="59" height="59" alt=""></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                  
                    <td>{{ $item->value }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <div class="row">
            
                            <a class="btn btn-danger" href="{{ url("seller/products/$item->id") }}">Excluir</a>
                            <form action="/seller/products/edit" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                &nbsp;<button class="btn btn-warning" type="submit">Editar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
