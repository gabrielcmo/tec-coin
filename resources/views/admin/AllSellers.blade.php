@extends('layouts.app')

@section('content')
    Usuário Vendedores <br/>
    @foreach($sellers as $seller)

        ID -> {{$seller->id}} <br/>
        Nome -> {{$seller->name}} <br/>
        Email -> {{$seller->email}} <br/>

    @endforeach

@endsection
