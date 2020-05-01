@extends('layouts.master')
@section('content')
    <form action="{{Route('mampara.update', $mampara->id)}}" method="post">
        @csrf
        <div class="row">
            <div class="m-1 col">
                <label for="titulo">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" value="{{$mampara->nombre}}" required>
            </div>
            <div class="m-1 col">
                <label for="titulo">Color:</label>
                <input class="form-control" type="text" id="color" name="color" value="{{$mampara->color}}" required>
            </div>

        </div>
        <div class="m-1">
            <label for="titulo">Tipo de cristal:</label>
            <input class="form-control" type="text" id="tipo" name="tipo" value="{{$mampara->tipoCristal}} " required>
        </div>
        <div class="row">
            <div class="m-1 col">
                <label for="titulo">Ducha o bañera:</label>
                <select class="form-control" name="duchaBañera" id="duchaBañera" required>
                    <option value="0" @if($mampara->duchaBañera == 1) selected @endif>Ducha</option>
                    <option value="1" @if($mampara->duchaBañera == 1) selected @endif>Bañera</option>
                </select>
            </div>
            <div class="m-1 col">
                <label for="titulo">Estimación de precio:</label>
                <input class="form-control" type="text" id="precio" name="precio" value="{{$mampara->estimacionPrecio}}" required>
            </div>
        </div>
        <div class="m-1">
            <label for="titulo">Perfil:</label>
            <input class="form-control" type="text" id="perfil" name="perfil" value="{{$mampara->perfil}}" required>
        </div>
        <br>
        <input class="btn btn-warning" type="submit" value="Actualizar">
    </form>

@endsection
