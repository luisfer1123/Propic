@extends('layouts.app')
@section('Acount',$total_anuncios)
@section('content')
    @include('pages.modals.anuncioCodigo')
    <div class="container-fluid bg-primary mt-3">
        <div class="mx-auto anuncion-titulo text-center text-white">
            <h3>Bienvenido a propicolombia</h3>
            <h5>Busquedad avanzada de propiedades en venta o arriendo</h5>
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
                      <a class="p-2 float-right text-white" data-toggle="modal" data-target="#exampleModal2" style="cursor: pointer" ><u>Buscar por codigo de propiedad</u></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">

    </div>

@endsection