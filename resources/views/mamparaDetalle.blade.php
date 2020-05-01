@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">Información de la mampara</h3>
            <div class="row">
                <div class="m-1 col">
                    <label for="titulo">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" value="{{$mampara->nombre}}" disabled>
                </div>
                <div class="m-1 col">
                    <label for="titulo">Color:</label>
                    <input class="form-control" type="text" id="color" value="{{$mampara->color}}" disabled>
                </div>

            </div>
            <div class="m-1">
                <label for="titulo">Tipo de cristal:</label>
                <input class="form-control" type="text" id="tipo" value="{{$mampara->tipoCristal}} " disabled>
            </div>
            <div class="row">
                <div class="m-1 col">
                    <label for="titulo">Ducha o bañera:</label>
                    <input class="form-control" type="text" id="precio" value="{{$mampara->duchaBañera}}" disabled>
                </div>
                <div class="m-1 col">
                    <label for="titulo">Estimación de precio:</label>
                    <input class="form-control" type="text" id="precio" value="{{$mampara->estimacionPrecio}}" disabled>
                </div>
            </div>
            <div class="m-1">
                <label for="titulo">Perfil:</label>
                <input class="form-control" type="text" id="perfil" value="{{$mampara->perfil}}" disabled>
            </div>
            <br>
            <a href="#" class="btn btn-primary">Contactar</a>
        </div>
    </div>

    <hr>
    <form action="{{Route('añadirPregunta', $mampara->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label class="h2">Preguntar</label>
        <textarea class="form-control" id="pregunta" name="pregunta" cols="100" rows="5" required></textarea>
        <br>
        <input type="file" class="form-control-file" name="adjunto">
        <br>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

    <br>
    <h3 class="text-center">Preguntas</h3>
    <hr>

    @if(count($mampara->pregunta) != 0)
        @foreach($mampara->pregunta as $preg)
            <form method="get">
                <div class="row">
                    <div class="col-1"><strong>Pregunta: </strong></div>
                    <div class="col-10 ml-3">
                        <p>{{$preg->textoPreg}}</p>
                    </div>
                    @if($preg->adjunto != null)
                        <div class="col">
                            <a href="{{route('archivo.descargar', $preg->id)}}">Descargar archivo</a>
                        </div>

                    @endif
                </div>
            </form>
            <div id="respuestaID{{$preg->id}}">
                @if($preg->respuesta != null)
                    <br>
                    <div class="row">
                        <div class="col-1"><strong>Respuesta: </strong></div>
                        <div class="col-10 ml-3">
                            <p>{{$preg->respuesta->comentario}}</p>
                        </div>
                    </div>
                @elseif($preg->respuesta == null && Auth::check())
                    <form method="post">
                        @csrf
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <textarea class="form-control" id="respuesta{{$preg->id}}" name="respuesta{{$preg->id}}" placeholder="Responder" cols="100" rows="3" required></textarea>
                        <br>
                        <input type="button" onclick="responder({{$preg->id}})" class="btn btn-primary" value="Enviar">
                    </form>
                @endif
            </div>
            @if(Auth::check())
                <a href="{{route('comentario.borrar', $preg->id)}}" class="btn btn-danger text-white">Borrar comentario</a>
            @endif
            <hr>
        @endforeach
    @else
        <p class="text-secondary">No hay preguntas todavía</p>
    @endif

@endsection


<script>
    function responder(id) {
        $.ajax({
            method: "post",
            url: '/pregunta/responder/'+id,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "comentario": $( "#respuesta"+id ).val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (respuesta) {
                $('#respuestaID'+id).empty();
                $('#respuestaID'+id).append('<br>');
                $('#respuestaID'+id).append('<div class="row"><div class="col-1"><strong>Respuesta: </strong></div><div class="col-10 ml-3"><p>'+respuesta+'</p></div></div>');
            },
            error: function (data) {
                console.log("Error");
                console.log(data);
            }
        });
    }
</script>
