@extends('layouts.master')
@section('content')
    <div class="alert alert-success alert-dismissible  collapse" id="successAlert" role="alert">
        El mensaje se ha enviado correctamente, te llegará un email al correo en un plazo de 2 días.
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="alert alert-danger alert-dismissible  collapse" id="successAlert" role="alert">
        El mensaje no se ha podido enviar correctamente. Pruebe más tarde.
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

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
            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img class="card-img-top" src="{{ asset('fotoMamparas/'.$mampara->foto1) }}" style="width: 50%">
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img class="card-img-top" src="{{ asset('fotoMamparas/'.$mampara->foto2) }}" style="width: 50%">
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <a href="" class="btn btn-primary contactarButton" data-toggle="modal" data-target="#contactar">Contactar</a>
            </div>

        </div>
    </div>

    <!--Modal-->

    <div class="modal fade" id="contactar" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactarLabel">Contactar con Mamparas Jesús</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="titulo">Nombre y apellidos:*</label>
                    <input class="form-control" type="text" id="nombrePersona{{$mampara->id}}" required>
                    <br>
                    <label for="titulo">Medidas:*</label>
                    <input class="form-control" type="text" id="medidasPersona{{$mampara->id}}" required>
                    <br>
                    <label for="titulo">Email:*</label>
                    <input class="form-control" type="text" id="emailPersona{{$mampara->id}}" required>
                    <br>
                    <label for="titulo">Confirmación de email:*</label>
                    <input class="form-control" type="text" id="emailPersona2{{$mampara->id}}" required>
                    <br>
                    <label for="titulo">Teléfono:*</label>
                    <input class="form-control" type="text" id="telefonoPersona{{$mampara->id}}" required>
                    <br>
                    <label for="titulo">Mensaje:</label>
                    <textarea id="mensaje{{$mampara->id}}" style="width: 100%" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary contactarButton" onclick="contactarEmpresa({{$mampara->id}})">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!--/Modal-->



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


    function contactarEmpresa(id) {
        let nombre = $( "#nombrePersona"+id ).val();
        let medidas = $( "#medidasPersona"+id ).val();
        let email = $('#emailPersona'+id).val();
        let emailConfirmacion = $('#emailPersona2'+id).val();
        let telefono = $('#telefonoPersona'+id).val();
        let mensaje = $('#mensaje'+id).val();
        var expRegMovil = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;
        var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;

        if(nombre != "" || email != "" || emailConfirmacion != "" || telefono != "" || mensaje != ""){
            if(email == emailConfirmacion){
                if(expRegNombre.exec(nombre)){
                    if(expRegMovil.exec(telefono)){
                        $.ajax({
                            method: "post",
                            url: '/mampara/contactar',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                                "nombre": nombre,
                                "medidas": medidas,
                                "email": email,
                                "telefono": telefono,
                                "mensaje": mensaje
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                $('#successAlert').show('fade');
                                $('.contactarButton').prop('disabled', true);

                                setTimeout(function() { $('#myAlert').hide('fade'); }, 10000);
                            },
                            error: function (data) {
                                console.log("Error");
                                console.log(data);
                            }
                        });
                    }else{
                        //ERROR
                        console.log('Error')
                    }
                }else{
                    //ERROR
                    console.log('Error')
                }
            }else{
                //ERROR
                console.log('Error')
            }
        }else{
            //ERROR
            console.log('Error')
        }
    }
</script>
