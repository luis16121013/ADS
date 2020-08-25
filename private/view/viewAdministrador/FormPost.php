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

            <div class="form-group col-md-6">
              <label class="text-primary" for="postDni">Dni</label>
              <input type="text" class="form-control" id="postDni" required placeholder="Dni" maxlength="8">
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary" for="postContact">Contacto</label>
              <input type="text" class="form-control" id="postContact" placeholder="telefono o celular" maxlength="15">
            </div>

            <div class="form-group col-md-6">
              <label class="text-primary" for="postFirstName">Nombres</label>
              <input type="text" class="form-control" id="postFirstName" placeholder="Nombres" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary" for="postLastName">Apellidos</label>
              <input type="text" class="form-control" id="postLastName" placeholder="Apellidos" maxlength="30">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="text-primary" for="postEmail">Email</label>
              <input type="email" class="form-control" id="postEmail" placeholder="Email">
            </div>
          </div>

          <div class="form-row">

            <!-- QUITANDO INPUT CIUDAD
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            -->
            <div class="form-group col-md-8">
              <label class="text-primary" for="postPass">Password</label>
              <input type="text" class="form-control" id="postPass" placeholder="Password">
            </div>
            <div class="form-group col-md-4">
              <label class="text-primary" for="opcion">Sexo</label>
              <select id="postOpcion" name="sexo" class="form-control">
                <option selected>Opcion</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>

            </div>

            <div class="form-group">
              <label class="text-primary" for="postDomicilio">Domicilio</label>
              <input type="text" class="form-control" id="postDomicilio" disabled placeholder="Jr ejemplo 888">
            </div>
            <!--  QUITANDO EL INPUT ZIP
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
          </div> 
            -->
          
          <!-- QUITANDO BOTON DEL FORMULARIO ENCAPSULADO
          <button type="submit" class="btn btn-primary">Sign in</button>
          -->

        </form>
        </div>

        <!-- aqui teermina el formulario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button id="insert" type="button" class="btn btn-primary">guardar cambios</button>
      </div>
    </div>
  </div>
</div> 