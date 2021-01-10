@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
    </div>
@endif

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo anuncio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/anuncios" method="POST">
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Departamento:</label>
              <select name="departamento" id="departamento" class="form-select">
                <option value="">Seleccione una opcion</option>
                @foreach ($departamentos as $departamento)
                  <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>  
                @endforeach
                  
              </select>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Ciudad o municipio:</label>
                <select name="ciudad" id="ciudad" class="form-select">

                </select>
            </div>
            <div class="mb-3">
              <label for="categoria">Categoria</label>
              <select name="categoria" id="categoria" class="form-select">
                <option value="">Seleccione una opcion</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="tipo">Tipo de anuncio</label>
              <select name="tipo" id="tipo" class="form-select">
                <option value="">Seleccione una opcion</option>
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="barrio">Barrio</label>
              <input type="text" name="barrio" id="barrio" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="direccion">Direccion</label>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="cuartos">Cantidad cuartos</label>
              <input type="Number" name="cuartos" id="cuartos" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="Mcuadrados">Metros Cuadrados</label>
              <input type="Number" name="Mcuadrados" id="Mcuadrados" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-floating">
              <textarea class="form-control" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
              <label for="floatingTextarea2">Descripción de la publicación</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Publicar Anuncio</button>
            </div>
          </form>
        </div>
      
        
      </div>
    </div>
</div>


@section('scriptjs')
<script>
  $(document).ready(function(){
    $("#departamento").on('change',function(){
        var id_departamento = $(this).val();
        if($.trim(id_departamento) != " "){
            $.get('ciudades',{id_departamento:id_departamento},function(ciudades){
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