@extends('layouts.app')

@section('content')
OBS: Falta fazer o form com um input do tipo hidden com o valor do ID da order e enviar para uma rota e ir para o controle adicionar/recusar os produtos :) <br/>
Listando todas as ordens <br/>

@foreach($all_order as $order)
    ID -> {{$order->id}} <br/>
    Product_ID -> {{$order->product_id}} <br/>
    Buyer_id -> {{$order->buyer_id}} <br/>
    Seller_ID -> {{$order->seller_id}} <br/>
    Valor -> {{$order->value}} <br/>

    <a href="{{  url("seller/orders/$order->id/accept/$order->buyer_id/$order->product_id") }}">Aceitar</a>
    <a href="{{  url("seller/orders/$order->id/deny") }}">Recusar</a>
@endforeach

Listando todos os produtos com os ids presentes nas orders <br/>

@foreach($all_products as $products)
    ID Produto -> {{$products->id}} <br/>
    Nome Produto -> {{$products->name}} <br/>
    Descrição Produto -> {{$products->description}} <br/>
    <img src="{{$products->image}}">

@endforeach
@endsection
