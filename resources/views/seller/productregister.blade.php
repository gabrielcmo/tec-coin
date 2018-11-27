@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div>
        <h1 class="display-4"><strong>Registrar produto</strong></h1>
        <hr>
    </div>
    <br>
    <form action="/seller/products/store" enctype="multipart/form-data" method="POST">
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="name" class="form-control" id="nome" aria-describedby="nome" placeholder="Computador">
                    </div>
                    <input type="hidden" name="type_id" value="{{ app(App\Http\Controllers\SellerController::class)->type_id_userProduct(Auth::user()->user_type_id) }}">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" name="value" class="form-control" id="valor" aria-describedby="valor" placeholder="1000">
                    </div>
                    <div class="form-group">
                        <label for="desc">Descrição</label>
                        <input type="text" name="description" class="form-control" id="desc" placeholder="Lojinha">
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <br><br>
                    <input type="file" name="image" id="foto">
                </div>
            </div>
            <button type="submit" class="btn btn-purple text-light">Registrar</button>
        {{ csrf_field() }}
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection
