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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection