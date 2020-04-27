@extends('layouts.master')
@section('content')
    <div>
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
                            <h5  class="card-title font-weight-bold text-uppercase">{{$ducha->nombre}} <span class="card-text text-capitalize text-secondary small ml-3">{{$ducha->color}}</span></h5>
                            <p class="card-text">Tipo de cristal: {{$ducha->tipoCristal}}</p>
                            <div class="row">
                                <p class="col-12 col-md-6"> Perfil: {{$ducha->perfil}}</p>
                                <p class="col-12 col-md-6 mb-sm-3 card-text">Estimación: {{$ducha->estimacionPrecio}}€ </p>
                            </div>
                            <p class="card-text"></p>
                            <a href="{{Route('detalleMampara', $ducha->id)}}" class="card-link">Ver mampara</a>
                            <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$ducha->id}}">Contactar</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar{{$ducha->id}}" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
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
                                <button type="button" class="btn btn-primary" onclick="contactarAnunciante({{$ducha->nombre}})">Enviar</button>

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
                            <h5  class="card-title font-weight-bold text-uppercase">{{$bañera->nombre}} <span class="card-text text-capitalize text-secondary small ml-3">{{$bañera->color}}</span></h5>
                            <p class="card-text">Tipo de cristal: {{$bañera->tipoCristal}}</p>
                            <div class="row">
                                <p class="col-12 col-md-6">Perfil: {{$bañera->perfil}}</p>
                                <p class="col-12 col-md-6 mb-sm-3 card-text ">Estimación: {{$bañera->estimacionPrecio}}€</p>
                            </div>
                            <p class="card-text"></p>
                            <a href="{{Route('detalleMampara', $bañera->id)}}" class="card-link">Ver mampara</a>
                            <a href="" class="card-link" data-toggle="modal" data-target="#contactar{{$bañera->id}}">Contactar</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactar{{$bañera->id}}" tabindex="-1" role="dialog" aria-labelledby="contactar" aria-hidden="true">
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
                                <button type="button" class="btn btn-primary" onclick="contactarAnunciante({{$bañera->nombre}})">Enviar</button>

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
