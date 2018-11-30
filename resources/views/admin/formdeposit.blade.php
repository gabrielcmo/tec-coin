@extends('layouts.app')

@section('content')
        <?php
            use App\Admin;
            use App\User;
            use App\Buyer;
        ?>
<div class="container">
    <br>
    <div>
        <h1 class="display-4"><i class="material-icons big">money</i> <strong>Novo depósito</strong></h1>
        <hr>
    </div>
    <br>
        <div class="col-md-12">
            <form action='user/deposit' method="POST">
                @csrf
                <?php
                    $users = User::where('user_type_id', User::$TYPE_BUYER)->orderBy('name', 'ASC')->get();

                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="buyer-id"  class="col-form-label text-md-right">Usuário</label><br>
                            <select type="number" class="form-control" name="buyer_id" id="buyer_id">
                                @foreach ($users as $user)
                                    <option value="{{ Buyer::where('user_id' , $user->id)->value('id') }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="value"  class="col-form-label text-md-right">Valor</label><br>
                            <input type="number" name="value" id="" class="form-control">
                        </div>
                    </div>
                </div>

                    <div class="form-group">
                        <label for="description"  class="col-form-label text-md-right">Descrição</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>

                <input type="hidden" name="admin_id" value="{{ Admin::where('user_id', Auth::user()->id)->value('id') }}">

                <div class="text-right">
                    <button type="submit" class="btn btn-purple">Enviar</button>
                </div>
            </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection