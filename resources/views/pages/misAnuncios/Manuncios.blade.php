@extends('layouts.app')
@section('Acount',$total_anuncios)
@section('content')
    <div class="container bg-white">

        <h3 class="text-center">Mis Anuncios</h3>

        <table class="table text-center table-responsive-sm">
            <thead>
                <tr>
                <th scope="col">id publicación</th>
                <th scope="col">Portada</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Tipo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Anuncios as $anuncio)
                <tr>
                    <th scope="row">{{$anuncio->id_anuncio}}</th>
                    <td><img src="{{ asset('images/anuncios/' . $anuncio->portada) }}" alt="portada" height="100" width="200"></td>
                    <td>{{$anuncio->ciudad}}</td>
                    <td>{{$anuncio->tipo}}</td>
                    <td>{{$anuncio->categoria}}</td>
                    <td>
                        <form action="{{ route('MisAnuncios.destroy',$anuncio->id_anuncio) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{URL::action([App\Http\Controllers\ManunciosController::class,'edit'],$anuncio->id_anuncio)}}" class="btn btn-success">Editar</a>
                            <button type="submit"class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>


    </div>


@endsection