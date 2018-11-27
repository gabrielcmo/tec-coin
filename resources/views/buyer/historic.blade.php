@extends('layouts.app')

@section('content')

    @if (empty($historic) || !is_array($historic))
        <h1>Como assim você não comprou nada ?! Vá ver alguns produtos!!</h1>
    @else
        @foreach($historic as $historic)

            ID Produto -> {{$historic->product_id}} <br/>
            ID Comprador -> {{$historic->buyer_id}} <br/>
            ID Vendedor -> {{$historic->seller_id}} <br/>
            Status do Produto -> {{$historic->status_id}} <br/>
            OrderStatus_ID -> {{$historic->id_order_status}} <br/>
            Valor da Compra -> {{$historic->value}} <br/><br>

        @endforeach
    @endif

@endsection
