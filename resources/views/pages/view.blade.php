@extends('layouts.app')

@section('Acount',$total_anuncios)


@section('content')

    <div class="container">
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
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

       
        <div class="card text-center mt-2">
            <div class="card-header">
              Detalles
            </div>
            <div class="card-body">
              <h5 class="card-title float-left">Ciudad:</h5>
              <p class="card-text">{{$ciudad->nombre}}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>
    </div>

@endsection