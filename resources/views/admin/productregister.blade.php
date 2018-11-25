@extends('layouts.app')

@section('content')

    <form action='/seller/products'>
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <input type="text" name='name' id="">
    <input type="number" id="">
    <input type="text" name="description" id="">
    <select name='type'>
        <option value='1'>
            Cantina
        </option value='2'>
            Lojinha
        <option value='3'>
            Xerox
        </option>
        <option>
        </option>
        <input type="submit" value="Enviar">
    </select>


    </form>

@endsection
