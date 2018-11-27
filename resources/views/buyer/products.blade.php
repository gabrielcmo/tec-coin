<?php 
      use App\Deposit;
      use App\Order;
      use App\Buyer;
      use App\Http\Controllers\BuyerController;
      $extract = BuyerController::extract();
?>
@extends('layouts.app')

@section('content')
<div class="container">
        <br>
        <div class="col-md-12">
            <div>
                <h1 class="display-4"><strong>Bem vindo, {{ Auth::user()->name }}.</strong></h1>
                <p class="lead">Você tem {{ $extract["balance"] }} TCs</p>
                <hr>
            </div>
            <br>
            <h2>
                <i class="material-icons">local_grocery_store</i>
                <em>Produtos disponíveis</em>
            </h2>
            <br>
            <div>
                <h4>
                    <i class="material-icons">local_mall</i>
                    Lojinha
                </h4>
                <br>
                <div class="row">
                        @foreach($storeProducts as $products)
                        <div class="line">
                        <div class="col-md-3 col-sm-4">
                            <form action='/products/order' method='POST'>
                                @csrf
                                    <input type="hidden" name="id" value="{{ $products->id }}" id=""> <br/>
                                    <div class="card" style="width: 270px;">
                                        <img class="card-img-top" src="http://www.clinicaprimacordis.com.br/wp-content/uploads/2016/10/orionthemes-placeholder-image.png"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$products->name}}</h5>
                                            <p class="card-text lead">Um lindo treco só seu!</p>
                                            <img src="{{url('/images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt=""> {{$products->value}}
                                            <input type="submit" class="btn text-light roxo-1" value="Comprar">
                                        </div>
                                    </div>
                            </form>
                        </div>
                        </div>
                        @endforeach
                        @foreach($xeroxProducts as $products)
                                        <div class="col-md-3 col-sm-4">
                                            <form action='/products/order' method='POST'>
                                                @csrf
                                                    <input type="hidden" name="id" value="{{ $products->id }}" id=""> <br/>
                                                    <div class="card" style="width: 270px;">
                                                        <img class="card-img-top" src="http://www.clinicaprimacordis.com.br/wp-content/uploads/2016/10/orionthemes-placeholder-image.png"
                                                            alt="Card image cap">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{$products->name}}</h5>
                                                            <p class="card-text lead">Um lindo treco só seu!</p>
                                                            <img src="{{url('/images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt=""> {{$products->value}}
                                                            <input type="submit" class="btn text-light roxo-1" value="Comprar">
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                        @endforeach

                        @foreach($canteenProducts as $products)
                            <div class="col-md-3 col-sm-4">
                                <form action='/products/order' method='POST'>
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $products->id }}" id=""> <br/>
                                        <div class="card" style="width: 270px;">
                                            <img class="card-img-top" width="640px" height="250px" src="{{ url("/images/$products->image") }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$products->name}}</h5>
                                                <p class="card-text lead">Um lindo treco só seu!</p>
                                                <p><img src="{{url('/images/logo.png')}}" width="25" height="25" alt=""> <strong class="margin-dp2">{{$products->value}}</strong>  
                                                <input type="submit" class="btn text-light roxo-1" value="Comprar"></p>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
