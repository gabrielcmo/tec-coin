@extends('layouts.app')

@section('content')

@if (count($ordersApprovedOFSeller) == 0)
    <h1 align='center'>Nenhum venda no momento :c</h1>
@else
    @foreach($ordersApprovedOFSeller as $order)
    ID -> {{$order->id}} <br/>
    Product_ID -> {{$order->product_id}} <br/>
    Buyer_id -> {{$order->buyer_id}} <br/>
    Seller_ID -> {{$order->seller_id}} <br/>
    OrderStatus_ID -> {{$order->id_order_status}} <br/>
    Valor -> {{$order->value}} <br/>
    @endforeach
@endif

@endsection
