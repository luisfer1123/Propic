@extends('layouts.app')

@section('content')
    @include('pages.modalAnuncio')
    <div class="container-fluid  mt-3" style="background-color:#BFBFBF">
        <div class="mx-auto text-center text-white pt-3">
            <form action="">
                <div class="row justify-content-center">
                    <div class="form-group col-md-3">
                    <select class="form-select" name="" id="">
                        <option>Tipo propiedad</option>
                        <option></option>
                        <option></option>
                    </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-select" name="" id="">
                        <option>Ciudad</option>
                        <option></option>
                        <option></option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-select" name="" id="">
                        <option>Arriendo</option>
                        <option>Venta</option>
                        </select>
                    </div>
                    <div class="col-md">
                      <button class="btn btn-success btn-block">Buscar</button>
                      <a href="" class="p-2 float-right text-dark"><u>Buscar por codigo de propiedad</u></a>
                    </div>
                    
                </div>
                
            </form>
        </div>
    </div>
    
    <div class="container-fluid mt-2 pb-2">
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right">Publicar anuncio</button>
    </div>

    <div class="container mt-5">        
        <div class="row">
            <div class="col-md-4 bg-dark text-white">
                <form action="" class="pt-3">
                    <h2 class="text-center display-4">Filtros</h2>
                    <hr class="bg-white">
                    <div class="form-group text-center">
                      <label for="">Precio</label>
                      <input type="text" name="" id="" class="form-control" placeholder="Desde $" aria-describedby="helpId">
                      <input type="text" name="" id="" class="form-control mt-1" placeholder="Hasta $" aria-describedby="helpId">
                    </div>
                    <hr class="bg-white">
                    <button class="btn btn-success btn-block">Aplicar filtros</button>
                </form>
            </div>

            <div class="col-md-8">
                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
@endsection
