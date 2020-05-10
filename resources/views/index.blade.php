@extends('layouts.master')
@section('content')
    <div class="d-none d-md-flex bg-light rounded row">
        <p class="offset-1 mt-3 text-muted font-weight-bold">Descripción de la página??</p>
    </div>
    <!--DUCHA-->
    <div class="mt-3">
        <h1 class="text-center">Duchas</h1>
        <hr>
        @if(count($mamparasDucha)==0)
            <br>
            <h5 class="text-center text-secondary">Los sentimos, no hay ninguna mampara de momento. Vuelva más tarde</h5>
        @else
        @foreach($mamparasDucha as $ducha)
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card mt-3 mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <h5  class="card-title font-weight-bold text-uppercase">{{$ducha->nombre}} <span class="card-text text-capitalize text-secondary small ml-3">{{$ducha->color}}</span></h5>
                                    <p class="card-text">Tipo de cristal: {{$ducha->tipoCristal}}</p>
                                    <p class="card-text"> Perfil: {{$ducha->perfil}}</p>
                                    <p class="card-text">Precio a partir de: {{$ducha->estimacionPrecio}}€ </p>
                                </div>
                                <div class="d-none d-md-flex col-md-4">
                                    <img class="card-img-top" src="{{ asset('fotoMamparas/'.$ducha->foto1) }}" style="width: 50%">
                                </div>
                            </div>
                            <a href="{{Route('detalleMampara', $ducha->id)}}" class="card-link">Ver mampara</a>
                            @if(Auth::check())
                                <a class="card-link" href="{{Route('mampara.editar', $ducha->id)}}">Editar</a>
                                <a class="card-link" href="{{Route('mampara.delete', $ducha->id)}}">Borrar</a>
                            @else
                                <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$ducha->id}}">Contactar</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar{{$ducha->id}}" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
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
                                <input class="form-control" type="text" id="nombrePersona{{$ducha->id}}" required>
                                <br>
                                <label for="titulo">Medidas:*</label>
                                <input class="form-control" type="text" id="medidasPersona{{$ducha->id}}" required>
                                <br>
                                <label for="titulo">Email:*</label>
                                <input class="form-control" type="text" id="emailPersona{{$ducha->id}}" required>
                                <br>
                                <label for="titulo">Confirmación de email:*</label>
                                <input class="form-control" type="text" id="emailPersona2{{$ducha->id}}" required>
                                <br>
                                <label for="titulo">Teléfono:*</label>
                                <input class="form-control" type="text" id="telefonoPersona{{$ducha->id}}" required>
                                <br>
                                <label for="titulo">Mensaje:</label>
                                <textarea id="mensaje{{$ducha->id}}" style="width: 100%" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="contactarEmpresa({{$ducha->id}})">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row paginacion d-flex justify-content-center">
            {{$mamparasDucha->appends(['p1' => $mamparasDucha->currentPage(), 'p2' => $mamparasBañera->currentPage()])->links()}}
        </div>
        @endif
        <!--BAÑERA-->
        <h1 class="text-center mt-5">Bañera</h1>
        <hr>
        @if(count($mamparasBañera)==0)
            <br>
            <h5 class="text-center text-secondary">Los sentimos, no hay ninguna mampara de momento. Vuelva más tarde</h5>
        @else
        @foreach($mamparasBañera as $bañera)
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card mt-3 mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <h5  class="card-title font-weight-bold text-uppercase">{{$bañera->nombre}} <span class="card-text text-capitalize text-secondary small ml-3">{{$bañera->color}}</span></h5>
                                    <p class="card-text">Tipo de cristal: {{$bañera->tipoCristal}}</p>
                                    <p class="card-text"> Perfil: {{$bañera->perfil}}</p>
                                    <p class="card-text">Precio a partir de: {{$bañera->estimacionPrecio}}€ </p>
                                </div>
                                <div class="d-none d-md-flex col-md-4">
                                    <img class="card-img-top" src="{{ asset('fotoMamparas/'.$bañera->foto1) }}" style="width: 50%">
                                </div>
                            </div>
                            <a href="{{Route('detalleMampara', $bañera->id)}}" class="card-link">Ver mampara</a>
                            @if(Auth::check())
                                <a class="card-link" href="{{Route('mampara.editar', $bañera->id)}}">Editar</a>
                                <a class="card-link" href="{{Route('mampara.delete', $bañera->id)}}">Borrar</a>
                            @else
                                <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$bañera->id}}">Contactar</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar{{$bañera->id}}" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
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
                                <input class="form-control" type="text" id="nombrePersona{{$bañera->id}}" required>
                                <br>
                                <label for="titulo">Medidas:*</label>
                                <input class="form-control" type="text" id="medidasPersona{{$bañera->id}}" required>
                                <br>
                                <label for="titulo">Email:*</label>
                                <input class="form-control" type="text" id="emailPersona{{$bañera->id}}" required>
                                <br>
                                <label for="titulo">Confirmación de email:*</label>
                                <input class="form-control" type="text" id="emailPersona2{{$bañera->id}}" required>
                                <br>
                                <label for="titulo">Teléfono:*</label>
                                <input class="form-control" type="text" id="telefonoPersona{{$bañera->id}}" required>
                                <br>
                                <label for="titulo">Mensaje:</label>
                                <textarea id="mensaje{{$ducha->id}}" style="width: 100%" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="contactarEmpresa({{$bañera->id}})">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row paginacion d-flex justify-content-center">
            {{$mamparasBañera->appends(['p1' => $mamparasDucha->currentPage(), 'p2' => $mamparasBañera->currentPage()])->links()}}
        </div>
        @endif
    </div>
@endsection

<script>
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
                                alert('yes')
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
