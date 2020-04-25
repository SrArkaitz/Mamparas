@extends('layouts.master')
@section('content')
    <h1>{{$titulo}}</h1>
    <hr>
    @foreach($mamparas as $mampara)
        <div class="row mb-2">
            <div class="col-12">
                <div class="card mt-3 mb-3" >
                    <div class="card-body">
                        <h5  class="card-title font-weight-bold text-uppercase">{{$mampara->nombre}} <span class="card-text text-capitalize text-secondary small ml-3">{{$mampara->color}}</span></h5>
                        <p class="card-text">Tipo de cristal: {{$mampara->tipoCristal}}</p>
                        <div class="row">
                            <p class="col-12 col-md-6">Perfil: {{$mampara->perfil}}</p>
                            <p class="col-12 col-md-6 mb-sm-3 card-text ">Estimación: {{$mampara->estimacionPrecio}}€</p>
                        </div>
                        <p class="card-text"></p>
                        <a href="{{Route('detalleMampara', $mampara->id)}}" class="card-link">Ver mampara</a>
                        <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$mampara->id}}">Contactar</a>
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
@endsection
