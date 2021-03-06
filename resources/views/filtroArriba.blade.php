@extends('layouts.master')
@section('content')
    <h1>Mamparas</h1>
    <hr>
    @if(count($mamparas)==0)
        <br>
        <h5 class="text-center text-secondary">Los sentimos, no hay ninguna mampara con ese filtro. Pruebe con otro</h5>
    @else
        @foreach($mamparas as $mampara)
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card mt-3 mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <h5  class="card-title font-weight-bold text-uppercase">{{$mampara->nombre}} <span class="card-text text-capitalize text-secondary small ml-3">{{$mampara->color}}</span></h5>
                                    <p class="card-text">Tipo de cristal: {{$mampara->tipoCristal}}</p>
                                    <p class="card-text"> Perfil: {{$mampara->perfil}}</p>
                                    <p class="card-text">Precio a partir de: {{$mampara->estimacionPrecio}}€ </p>
                                </div>
                                <div class="d-none d-md-flex col-md-4">
                                    <img class="card-img-top" src="{{ asset('fotoMamparas/'.$mampara->foto1) }}" style="width: 50%">
                                </div>
                            </div>
                            <a href="{{Route('detalleMampara', $mampara->id)}}" class="card-link">Ver mampara</a>
                            @if(Auth::check())
                                <a class="card-link" href="{{Route('mampara.editar', $mampara->id)}}">Editar</a>
                                <a class="card-link" href="{{Route('mampara.delete', $mampara->id)}}">Borrar</a>
                            @else
                                <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$mampara->id}}">Contactar</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar{{$mampara->id}}" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactarLabel">Contactar con compañero</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <textarea placeholder="Mensaje" id="mensaje" name="mensaje" style="width: 100%"></textarea>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="contactarAnunciante({{$mampara->nombre}})">Enviar</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row paginacion d-flex justify-content-center">
            {{$mamparas->links()}}
        </div>
    @endif
@endsection
