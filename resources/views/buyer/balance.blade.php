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
            <h6>Total: 100 TCs</h6>
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
                    <tr class="table-danger">
                        <th scope="row"><i class="material-icons"> expand_more </i></th>
                        <td>30 TCs</td>
                        <td>Coxinha</td>
                        <td>02/10</td>
                    </tr>
                    <tr class="table-success">
                        <th scope="row"><i class="material-icons"> expand_less </i></th>
                        <td>100 TCs</td>
                        <td>Zerou o jogo lá</td>
                        <td>22/07</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection