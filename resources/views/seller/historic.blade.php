<?php
    use App\Product;
    use App\Seller;
    use App\OrderStatus;
    use App\User;
    use App\Buyer;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div>
        <h1 class="display-4"><i class="material-icons big">restore</i> <strong>Histórico de vendas</strong></h1>
        <p class="lead">Confira aqui o histórico de todas as suas vendas</p>
        <hr>
    </div>
    <br>
    @if (count($approvedOrders) == 0)
        <h1>Nenhum venda no momento :c</h1>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome do produto</th>
                <th>Comprador</th>
                <th>Status da compra</th>
                <th>Valor da Compra</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($approvedOrders as $approvedOrder)
                <tr>
                    <td>{{$approvedOrder->product->name}}</td>
                    <td>{{$approvedOrder->buyer->user->name}}</td>
                    <td>{{$approvedOrder->status->description}}</td>
                    <td>{{$approvedOrder->value}}</td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>


<!---caso precise
@if (count($approvedOrders) == 0)
    <h1 align='center'>Nenhum venda no momento :c</h1>
@else

    @foreach($approvedOrders as $approvedOrder)
        Product Name -> {{$approvedOrder->product->name}} <br/>
        Buyer Name -> {{$approvedOrder->buyer->user->name}} <br/>
        OrderStatus_ID -> {{$approvedOrder->status->description}} <br/>
        Valor -> {{$approvedOrder->value}} <br/>
    @endforeach

@endif
-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
