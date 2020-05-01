<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mamparas Jesus</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- /Bootstrap -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-2" href="{{route('index')}}"><img src="{{asset('img/logo.png')}}" height="42" width="42"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('custom')}}">Customizar mampara</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('añadirMampara')}}">Añadir mampara</a>
                </li>
            @endif
        </ul>


        <form class="navbar-nav form-inline mr-5" action="{{Route('buscar')}}" method="post">
            @csrf
            <select class="form-control mr-1" name="temaFiltro">
                <option class="text-secondary" value="tema">Temas</option>
                <option class="font-weight-bold" value="ducha">Ducha</option>
                <option class="font-weight-bold" value="bañera">Bañera</option>
            </select>
            <input class="form-control mr-sm-2" type="search"  name="nombreFiltro" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-link">{{Auth::user()->name}}</a></li>
                <li><a class="nav-link" href="{{route('logout')}}">Cerrar sesión</a></li>
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-link" href="/login">Iniciar sesión</a></li>

            </ul>
        @endif
    </div>
</nav>
<div class="container mt-4 "style="height: 500px">
    <div class="row">
        <div class="btn-group mb-3 col-12 d-md-none" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-primary"><a class="nav-item text-white" href="{{Route('filtroLateral', 'bañera')}}">Bañeras</a></button>
            <button type="button" class="btn btn-primary text-black-50"><a class="nav-item text-white" href="{{Route('filtroLateral', 'ducha')}}">Duchas</a>
            </button>
            <button type="button" class="btn btn-primary text-black-50"><a class="nav-item text-white" href="{{Route('filtroLateral', 'todo')}}">Ver todo</a>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-2  mt-5 d-none d-md-block ml-3 mr-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="nav-item" href="{{Route('filtroLateral', 'bañera')}}">Bañeras</a>
                </li>
                <li class="list-group-item">
                    <a class="nav-item" href="{{Route('filtroLateral', 'ducha')}}">Duchas</a>
                </li>
                <li class="list-group-item">
                    <a class="nav-item" href="{{Route('filtroLateral', 'todo')}}">Ver todo</a>
                </li>
            </ul>
            <div class="card mt-5">
                <div class="card-header infoAdicionalHead font-weight-bold" style="background-color: #FFC213">
                    Información
                </div>
                <div class="card-body infoAdicionalBody">
                    <p class="card-text font-weight-bold">Debido al reciente COVID-19 se mantienen todas las normas de seguridad e higiene.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
