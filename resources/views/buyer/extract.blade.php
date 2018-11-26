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
@endsection