<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QrFacil</title>

    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    
</head>
<style>
    body {
        background-color: #e0e0df;
    }
</style>
<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{route('usuario.home')}}">Usuários</a></li>
        <li class="divider"></li>
        <li><a href="{{route('usuario.senha')}}">Alterar Senha</a></li>
        <li class="divider"></li>
        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
    Sair</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>
<nav>
    <div class="nav-wrapper teal darken-4">
      <a href="{{route('cliente.home')}}" class="brand-logo">QrFacil</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
            <a class="dropdown-button" href="#!" data-activates="dropdown1">
                <i class="material-icons left">person</i>
                {{Auth::user()->name}}
                <i class="material-icons right">arrow_drop_down</i>
            </a>
        </li>
    </ul>
</div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
