<div class="modal fade" id="formPOST" tabindex="1" role="dialog" aria-labelledby="formPOSTLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="formPOSTLabel">Registro Docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- desde aqui comienza el formulario -->

        <div class="container">
          <form >
          <div class="form-row">
            <div class="form-group col-md-3">
              <label class="text-primary" for="postDescription">Fecha limite:</label>
            </div>
            <div class="form-group col-md-9">
                <input class="form-control" type="date" value="2011-08-19" id="dateTask" >
            </div>

            <div class="form-group col-md-3">
            <label class="text-primary" for="postDescription">Hora limite:</label>
            </div>
            <div class="form-group col-md-9">
                <input class="form-control" type="time" value="13:45:00" id="timeTask" >
            </div>

            <div class="form-group col-md-12">
              <label class="text-primary" for="postDescription">Descripcion:</label>
              <textarea type="area" class="form-control" id="postDescription" placeholder="Descripcion de la tarea" rows="4">
              </textarea>
            </div>

            <div class="form-group custom-file col-md-12">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">selecione su archivo</label>
            </div>

          </div>

          </form>
        </div>

        <!-- aqui teermina el formulario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button id="insertTask" type="button" class="btn btn-primary">guardar cambios</button>
      </div>
    </div>
  </div>
</div> 