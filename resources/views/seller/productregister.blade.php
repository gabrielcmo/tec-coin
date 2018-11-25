@extends('layouts.app')
@section('content')

    <form action='/seller/products/store' method='post' enctype="multipart/form-data">
    @csrf
    Nome:
    <input type="text" name="name" id="" required>
    Valor:
    <input type="number" name="value" id="" required>
    Tipo:
    <small>Cantina:</small>
    <input type="radio" name="id_type" value='1' id="">
    <small>Xerox:</small>
    <input type="radio" name="id_type" value='2' id="">
    <small>Lojinha:</small>
    <input type="radio" name="id_type" value='3' id="">
    </form>
    <small>Descrição:</small>
    <input type="text" name="description" id="" required>
    <small>Imagem:</small>
    <input type="file" name="image" id="" required>
    <input type="submit" value="Cadastrar">
    </form>

@endsection
