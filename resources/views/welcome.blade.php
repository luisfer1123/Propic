@extends('layouts.app')
@section('Acount',$total_anuncios)
@section('content')
    @include('pages.modals.anuncioCodigo')
    <div class="container-fluid bg-primary mt-3">
        <div class="mx-auto anuncion-titulo text-center text-white">
            <h3>Bienvenido a propicolombia</h3>
            <h5>Busquedad avanzada de propiedades en venta o arriendo</h5>

                {!! Form::open(['url' => '/anuncios']) !!}
                {!! Form::token() !!}
                <div class="row">
                    <div class="form-group col-md-3">
                      <select class="custom-select" name="f_categoria" id="">
                        <option selected>Categoria</option>
                        @foreach ($categorias as $categoria)
                          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="custom-select" name="f_ciudad" id="">
                          <option selected>Ciudad</option>
                          @foreach ($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="custom-select" name="f_tipo" id="">
                          <option selected>Tipo de Anuncio</option>
                          @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                          @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success form-group">Buscar</button>
                </div>
                <a data-toggle="modal" data-target="#exampleModal2" style="cursor: pointer" class="form-group float-right text-white"><u>Buscar por codigo de propiedad</u></a>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="container">

    </div>

@endsection