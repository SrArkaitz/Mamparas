@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">{{$mampara->nombre}}</h3>
            <p class="card-text">Tipo de cristal: {{$mampara->tipoCristal}}</p>
            <p class="card-text">Tipo de perfil: {{$mampara->perfil}}</p>
            <p class="card-text">Color: {{$mampara->color}}</p>
            <p class="card-text">Para que sitio: @if($mampara->duchaBañera == 0)Ducha @else Bañera @endif</p>
            <p class="card-text">Estimación de precio: {{$mampara->estimacionPrecio}}</p>
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
                        <textarea class="form-control" id="respuesta" name="respuesta" placeholder="Responder" cols="100" rows="3" required></textarea>
                        <br>
                        <input type="button" onclick="responder({{$preg->id}})" class="btn btn-primary" value="Enviar">
                    </form>
                @endif
            </div>

            <hr>
        @endforeach
    @else
        <p>No hay preguntas todavía</p>
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
                "comentario": $( "#respuesta" ).val()
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
