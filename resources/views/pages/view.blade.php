@extends('layouts.app')

@section('Acount',$total_anuncios)


@section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-interval="2000">
                <img src="{{  asset('images/anuncios/' . $portada->portada) }}" class="d-block w-100">
              </div>
              @foreach ($fotos as $foto)
                  <div class="carousel-item" data-interval="2000">
                      <img src="{{  asset('images/anuncios/' . $foto->nombre) }}" class="d-block w-100">
                  </div>  
              @endforeach
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card" style="min-height: 360px">
            <div class="card-body">
              <h3 class="card-title text-center">{{$tipo->nombre}} de {{$categoria->nombre}}</h3>
              <div class="card-text text-left pt-5">Ciudad: {{$ciudad->nombre}}  <p class="float-right">Barrio: {{$portada->barrio}}</p></div>
              <div class="card-text pt-2">Descripción <p> {{$portada->descripcion}} </p></div>
              <div class="card-text pt-2">Cantidad de cuartos: {{$portada->cuartos}} <p class="float-right">Metros cuadrados: {{$portada->metros_cuadrados}}</p></div>
              <div class="card-text pt-5 text-muted">Fecha de publicacion: {{date("d/m/y",strtotime($portada->created_at))}}</div>
            </div>
          </div>
        </div>
      </div>
      

       
        
    </div>

@endsection