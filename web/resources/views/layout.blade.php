<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Controle de Séries</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" href="{{ route('listar_serie') }}">Home</a>
        @auth
        <a href="/sair" class="text-danger">Sair</a>
        @endAuth
        @guest
        <span class="d-flex">
            <a href="/registrar" class="mr-1 text-info">Criar Conta</a> | <a href="/entrar" class="ml-1 text-info">Entrar</a>
        </span>
        @endGuest
    </nav>
    <div class="container">
        <div class="jumbotron p-2">
            @yield('cabecalho')
        </div>
        @yield('conteudo')
    </div>
</body>

</html>