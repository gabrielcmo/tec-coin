@extends('layouts.app')

@section('content')

    @foreach($historic as $historic)

        ID Produto -> {{$historic->product_id}} <br/>
        ID Comprador -> {{$historic->id_buyer}} <br/>
        ID Vendedor -> {{$historic->seller_id}} <br/>
        Status do Produto -> {{$historic->status_id}} <br/>
        Valor da Compra -> {{$historic->value}} <br/>

    @endforeach

@endsection
