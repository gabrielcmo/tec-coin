@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <div class="col-md-12">
            <div>
                <h1 class="display-4"><strong>Extrato</strong></h1>
                <p class="lead">Confira aqui suas transações</p>
                <hr>
            </div>
            <h6><strong> Total: {{ $balance }} TCs</strong></h6>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($displayExtract as $extractItem)
                        <tr class="{{ $extractItem->type == 'order' ? 'table-danger' : 'table-success' }}">
                            <td>{{ $extractItem->type == 'order'  ?  'Compra'  :  'Depósito' }}</td>
                            <td>{{ $extractItem->value }} TCs</td>
                            <td>{{ $extractItem->description }}</td>
                            <td>{{ $extractItem->date }}</td>
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