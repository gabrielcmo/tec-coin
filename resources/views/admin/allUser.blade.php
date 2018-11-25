@extends('layouts.app')

@section('content')

@foreach($AllUsers as $user)

    ID -> {{$user->id}} <br/>
    Nome -> {{$user->name}} <br/>
    Email -> {{$user->email}} <br/>
    User_Type_ID -> {{$user->user_type_id}} <br/>

@endforeach

@endsection
