@extends('layouts.master')
@section('content')
    <h2 class="text-center">Añadir nueva mampara</h2>

    <form action="{{route('guardarMampara')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="cliente border-secondary form-group ">
            <div class="m-1">
                <label for="titulo">Nombre:</label>
                <input class="form-control" type="text" placeholder="Mampara de metacrilato" id="nombre" name="nombre" required>
            </div>
            <div class="m-1">
                <label for="tipo">Tipo de cristal:</label>
                <input class="form-control" type="text" placeholder="Cristal templado" id="tipo" name="tipo" required>
            </div>

            <div class="m-1">
                <label for="perfil">Perfil:</label>
                <input class="form-control" placeholder="Horizontal" type="text" id="perfil" name="perfil"required>
            </div>

            <div class="m-1">
                <label for="color">Color:</label>
                <input class="form-control" placeholder="verde" type="text" id="color" name="color" required>
            </div>

            <div class="m-1">
                <label for="tema">Tema</label>

                <select class="custom-select" name="tema" required>
                    <option disabled selected value="">--</option>
                    <option value="0">Ducha</option>
                    <option value="1">Bañera</option>
                </select>
            </div>

            <div class="m-1">
                <label for="color">Precio a partir de:</label>
                <input class="form-control" type="number" id="precio" name="precio" placeholder="200" required>
            </div>

            <div class="m-1">
                <label for="color">Foto nº1:</label>
                <input type="file" class="form-control-file" name="foto1" required>
            </div>

            <div class="m-1">
                <label for="color">Foto nº2:</label>
                <input type="file" class="form-control-file" name="foto2" required>
            </div>

            <div class="m-1">
                <button class="btn btn-1  btn-primary mt-2" type="submit" value="Crear pregunta" style="">Añadir mampara</button>
            </div>
        </div>
    </form>
@endsection
