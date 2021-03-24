<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Busqueda por codigo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="anuncios" name="BCodigo" id="BCodigo">
        <div class="modal-body">
              <div class="mb-3">
                <label for="codigoB">Ingrese el codigo de la publicación</label>
                <input type="text" class="form-control" id="codigoB" name="codigoB" onkeypress="return valideKey(event);">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </form>
      </div>
    </div>
</div>

