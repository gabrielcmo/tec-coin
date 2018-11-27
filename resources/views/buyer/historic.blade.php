@extends('layouts.app')

@section('content')

    @foreach($historic as $historic)

        ID Produto -> {{$historic->product_id}} <br/>
        ID Comprador -> {{$historic->buyer_id}} <br/>
        ID Vendedor -> {{$historic->seller_id}} <br/>
        Status do Produto -> {{$historic->status_id}} <br/>
        OrderStatus_ID -> {{$historic->id_order_status}} <br/>
        Valor da Compra -> {{$historic->value}} <br/><br>

    @endforeach

@endsection
