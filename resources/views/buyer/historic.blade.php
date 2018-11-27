<?php
    use App\Product;
    use App\Seller;
    use App\OrderStatus;
    use App\User;
?>
@extends('layouts.app')

@section('content')
<div class="container">

        @if (empty($historic))
        <h1>Como assim você não comprou nada ?! Vá ver alguns produtos!!</h1>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Nome do Vendedor</th>
                    <th>Status</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historic as $historic)
                    <tr>
                        <td>{{$historic->product->name}}</td>
                        <td>{{$historic->seller->user->name}}</td>
                        <td>{{$historic->status->description}}</td>
                        <td>{{$historic->value}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
