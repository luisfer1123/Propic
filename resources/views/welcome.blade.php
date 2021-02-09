@extends('layouts.app')
@section('Acount',$total_anuncios)
@section('content')

    <div class="container-fluid bg-primary mt-3">
        <div class="mx-auto anuncion-titulo text-center text-white">
            <h3>Bienvenido a propicolombia</h3>
            <h5>Busquedad avanzada de propiedades en venta o arriendo</h5>
            <form action="">
                <div class="row">
                    <div class="form-group col-md-3">
                      <select class="form-control" name="" id="">
                        <option>Tipo propiedad</option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-control" name="" id="">
                          <option>Ciudad</option>
                          <option></option>
                          <option></option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-control" name="" id="">
                          <option>Arriendo</option>
                          <option>Venta</option>
                        </select>
                    </div>
                    <button class="btn btn-success form-group">Buscar</button>
                    
                </div>
                <a href="" class="form-group float-right text-white"><u>Buscar por codigo de propiedad</u></a>
            </form>
        </div>
    </div>

    <div class="container">
      
    </div>
     
@endsection