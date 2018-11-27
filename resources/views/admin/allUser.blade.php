@extends('layouts.app')

@section('content')

<div class="container">
        <br>
        <div class="col-md-12">
            <div>
                <h1 class="display-4"><strong>Usuários cadastrados</strong></h1>
                <hr>
            </div>
            <br>
            <?php
                use App\Http\Controllers\BuyerController;
                use App\Deposit;
                use App\Order;
                use App\Buyer;
            ?>
            @if (!isset($AllUsers))
                <h1>Nenhum usuário</h1>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Saldo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($AllUsers as $user)
                        <?php
                            $idBuyer = Buyer::where('user_id', $user->id)->value('id');
                            $deposits = Deposit::where("buyer_id", $idBuyer)->get();
                            $orders = Order::where(["buyer_id" => $idBuyer, "status_id" => 1, "status_id" => 2])->get();
                            $balance = BuyerController::toBalance($orders, $deposits);
                        ?>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$balance}}</td>
                            <td>
                                <div class="row">
                                        <form action="user/{{$user->id}}/delete" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Excluir</button>
                                        </form>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection