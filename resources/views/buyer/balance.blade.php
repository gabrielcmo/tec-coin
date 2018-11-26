@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">    
    <div align='center'>
        <img src="{{ url('images/money.gif') }}" height="200" width="200" alt="">
    </div>
    <h3>Seu saldo é de <strong> R${{ isset($balance) ? $balance : 0 }}.00 </strong></h3>
</div>
@endsection               
=======

    Seu saldo Atual é: {{$balance}};

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
>>>>>>> ea47c3dd57a071644186dc3eae1436b0b7c99160
