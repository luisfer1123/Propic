@extends('layouts.app')

@section('Acount',$total_anuncios)

@section('linkscss')
    <link rel="stylesheet" href="{{asset('./css/cards.css')}}">
@endsection

@section('content')
    @include('pages.modalAnuncio')
    @include('pages.modals.anuncioCodigo')
    <div class="container-fluid  mt-3" style="background-color:#BFBFBF">
        <div class="mx-auto text-center text-white pt-3">
            <form action="anuncios">
                <div class="row justify-content-center">
                    <div class="form-group col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="f_categoria" required>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Ciudad</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="f_ciudad" required>
                              @foreach ($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Tipo de anuncio</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="f_tipo" required>
                                @foreach ($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                      <button class="btn btn-success btn-block" type="submit">Buscar</button>
                      <a class="p-2 float-right text-dark" data-toggle="modal" data-target="#exampleModal2" style="cursor: pointer" ><u>Buscar por codigo de propiedad</u></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($f_anuncios)
            <div class="alert alert-success mt-2" role="alert">
                Resultados de la busqueda:
            </div>
    @endif

    <div class="container-fluid mt-2 pb-2">
        @guest
        @else
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right">Publicar anuncio</button>
        @endguest

    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <!--Anuncios-->
            @foreach ($anuncios as $anuncio)
            <div class="col-sm">
                <div class="card card-anuncio mb-3" style="max-width: 350px;">
                    <img src="{{ asset('images/anuncios/' . $anuncio->portada) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$anuncio->tipo_anuncio}} de {{$anuncio->categoria}}</h5>
                        <h6>Descripcion</h6>
                        <p class="card-text">{{$anuncio->descripcion}}</p>
                        <p class="card-text float-right"><em>M. Cuadrados: {{$anuncio->metros_cuadrados}}m<sup>2</sup> </em></p>
                        <p class="card-text"><em>C. Cuartos: {{$anuncio->cuartos}}  </em></p>
                        <p class="card-text"><small class="text-muted">Ubicacion: {{$anuncio->ciudad}}</small></p>
                        <p class="card-text"><small class="text-muted">Fecha de publicacion: {{$anuncio->created_at}}</small></p>
                        <a href="{{ route('anuncios.show',$anuncio->id) }}" class=" stretched-link">Ver mas informacion</a>
                        </div>
                </div>
            </div>
            @endforeach
            <!--Fin de anuncios-->
        </div>
    </div>

@endsection
