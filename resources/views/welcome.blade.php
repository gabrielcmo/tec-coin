<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TecCoin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #ffffff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #FFF;
            }

            .links > a {
                color: #FFF;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .m-left{
                margin-left: 15px;
            }

        </style>
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body class="roxo-1">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="{{url('/images/logo.png')}}" width="110" height="110" alt="">
                <div class="title m-b-md">TecCoin</div>

                <div class="links">
                    <a href="https://laravel.com/docs">Sobre</a>
                    <a href="https://laracasts.com">Transações</a>
                    <a href="https://github.com/laravel/laravel">Idealizadores</a>
                    <a href="https://laravel-news.com">Novidades</a>
                </div>
                <br><br>
                <div class="flex-center">
                 <p><h2>Patrocidado por:    </h1>  <img class="m-left" src="{{ url("images\logo.jpeg")}}" width="110px"></p>
                 </div>
            </div>
        </div>
    </body>
</html>
