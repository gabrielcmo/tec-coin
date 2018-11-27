<?php
    use App\Product;
    use App\Seller;
    use App\OrderStatus;
    use App\User;
?>
@extends('layouts.app')

@section('content')
<?php
use App\Buyer;
use App\Http\Controllers\BuyerController;

        $idBuyer = 2;
        $extract = BuyerController::extract($idBuyer);
        $balance = $extract["balance"];
        echo $balance;
?>

    @if (empty($historic))
        <h1>Como assim você não comprou nada ?! Vá ver alguns produtos!!</h1>
    @else
        @foreach($historic as $historic)

            ID Produto -> {{$historic->product_id}} <br/>
            ID Comprador -> {{$historic->buyer_id}} <br/>
            ID Vendedor -> {{$historic->seller_id}} <br/>
            Status do Produto -> {{$historic->status_id}} <br/>
            Valor da Compra -> {{$historic->value}} <br/><br>

        @endforeach
    @endif

@endsection
