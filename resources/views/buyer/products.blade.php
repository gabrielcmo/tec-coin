@extends('layouts.app')

@section('content')



Produtos da Lojinha


@foreach($storeProducts as $products)

    @csrf
    <input type="text" name="" id=""> <br/>
    <input type="text" name="id" value="{{ $products->id }}" id=""> <br/>
    <input type="text" name="id_product" value='{{$products->type_id}}'> <br/>
    Nome: {{$products->name}} <br/>
    Valor: {{$products->value}}
    <img src="{{$products->image}}">
    <input type="submit" value="Comprar">
    </form>
@endforeach

Produtos Xerox

@foreach($xeroxProducts as $products)
    <form action='/products/order' method='POST'>
    @csrf
    <input type="hidden" name="id" value='{{$products->id}}'>
    Nome: {{$products->name}} <br/>
    Valor: {{$products->value}} <br/>
    <img src='{{$products->image}}'>
    <input type="submit" value="Comprar">
    </form>
@endforeach

Produtos Cantina

@foreach($canteenProducts as $products)

<form action='/products/order' method='POST'>
    @csrf
    <input type="hidden" name="id" value="{{$products->id}}"> <br/>
    <input type="hidden" name="id_product" value='{{$products->type_id}}'> <br/>
    Nome: {{$products->name}} <br/>
    Valor: {{$products->value}} <br/>
    <img src="{{$products->image}}">
    <input type="submit" value="Comprar">
</form>

@endforeach


@endsection
