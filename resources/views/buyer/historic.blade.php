<?php
    use App\Product;
    use App\Seller;
    use App\OrderStatus;
    use App\User;
?>
@extends('layouts.app')

@section('content')
<div class="container">
<br>
        <div class="col-md-12">
            <div>
                <h1 class="display-4"><i class="material-icons big">all_inbox</i> <strong>Histórico</strong></h1>
                <p class="lead">Confira aqui todas suas compras passadas</p>
                <hr>
            </div>
            <br>
    @if (empty($historic))
        <h1>Como assim você não comprou nada ?! Vá ver alguns produtos!!</h1>
    @else
    <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Nome Vendedor</th>
                        <th scope="col">Status do compra</th>
                        <th scope="col">Valor da compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historic as $historic)
                        <tr>
                        <?php
                        $productname = Product::where('id', $historic->product_id)->value('name');
                        $productdescription = Product::where('id', $historic->product_id)->value('description');
                        $whoSell = Seller::where('id', $historic->seller_id)->value('user_id');
                        $whoSellUser = User::where('id', $whoSell)->value('name');
                        $productStatus = OrderStatus::where('id', $historic->status_id)->value('description');
                        ?>
                            <td>{{$productname}}</td>
                            <td>{{$whoSellUser}}</td>
                            <td>{{$productStatus}}</td>
                            <td>{{$historic->value}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    @endif
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
