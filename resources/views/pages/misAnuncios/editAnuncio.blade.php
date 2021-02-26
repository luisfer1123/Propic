@extends('layouts.app')
@section('Acount',$total_anuncios)
@section('content')

    <div class="container">
      <h3 class="text-center">Editar Anuncio</h3>
      <form action="{{ route('MisAnuncios.update',$id_anuncio) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Departamento:</label>
          <select name="departamento" id="departamento" class="form-control">
            <option value="">Seleccione una opcion</option>
            @foreach ($departamentos as $departamento)
              @if ($departamento->id == $ciudad->id_departamento)
              <option selected value="{{$departamento->id}}">{{$departamento->nombre}}</option>          
              @else
              <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>      
              @endif
              
            @endforeach
              
          </select>
        </div>
        <div class="mb-3">
          <label for="message-text" class="col-form-label">Ciudad o municipio:</label>
            <select name="ciudad" id="ciudad" class="form-control">

            </select>
        </div>
        <div class="mb-3">
          <label for="categoria">Categoria</label>
          <select name="categoria" id="categoria" class="form-control">
            <option value="">Seleccione una opcion</option>
              @foreach ($categorias as $categoria)
                  @if ($categoria->id == $datos_anuncio->id_categoria)
                      <option selected value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                  @else
                      <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                  @endif
              @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="tipo">Tipo de anuncio</label>
          <select name="tipo" id="tipo" class="form-control">
            <option value="">Seleccione una opcion</option>
            @foreach ($tipos as $tipo)
                @if ($tipo->id == $datos_anuncio->tipo_anuncio)
                    <option selected value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @else
                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endif
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="barrio">Barrio</label>
          <input type="text" name="barrio" id="barrio" value="{{$datos_anuncio->barrio}}" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="mb-3">
          <label for="direccion">Direccion</label>
          <input type="text" name="direccion" id="direccion" value="{{$datos_anuncio->direccion}}" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="mb-3">
          <label for="cuartos">Cantidad cuartos</label>
          <input type="Number" name="cuartos" id="cuartos" value="{{$datos_anuncio->cuartos}}" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="mb-3">
          <label for="Mcuadrados">Metros Cuadrados</label>
          <input type="Number" name="Mcuadrados" id="Mcuadrados" class="form-control" value="{{$datos_anuncio->metros_cuadrados}}" placeholder="" aria-describedby="helpId" step="any">
        </div>
        <div class="form-floating">
          <label for="floatingTextarea2">Descripción de la publicación</label>
          <textarea class="form-control" name="descripcion" placeholder="Descripcion" id="floatingTextarea2" style="height: 100px">{{$datos_anuncio->descripcion}}</textarea>
        </div>
        <div class="mt-3">
          <label for="formFileMultiple" class="form-label">Seleccione la portada</label>
          <input class="form-control" accept="image/*" name="portada" type="file" id="formFileMultiple">
        </div>
        <div class="mt-3">
          <label for="formFileMultiple" class="form-label">Seleccione las imagenes</label>
          <input class="form-control" accept="image/*" name="imagenes[]" type="file" id="formFileMultiple" multiple>
        </div>
        <div class="modal-footer">
          <a href="{{ url('MisAnuncios') }}" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>

@endsection

@section('scriptjs')


<script>
  var id_departamento = document.getElementById("departamento").value;
    $.get('/ciudades',{id_departamento:id_departamento},function(ciudades){
              $("#ciudad").empty();
              $("#ciudad").append("<option value=''>Seleccione una opcion</option>");              
              $.each(ciudades,function(index,value){
                if (index == {{$datos_anuncio->id_ciudad}}) {
                  $("#ciudad").append("<option selected value='"+index+"'>"+value+"</option>");
                } else {
                  $("#ciudad").append("<option value='"+index+"'>"+value+"</option>");  
                }
                
              });
            });
  $(document).ready(function(){
    $("#departamento").on('change',function(){
        var id_departamento = $(this).val();
        if($.trim(id_departamento) != " "){
            $.get('/ciudades',{id_departamento:id_departamento},function(ciudades){
              $("#ciudad").empty();
              $("#ciudad").append("<option value=''>Seleccione una opcion</option>");
              $.each(ciudades,function(index,value){
                $("#ciudad").append("<option value='"+index+"'>"+value+"</option>");
              });
            });
        }    
    });
    
  });
  
    
  
</script>

@endsection
