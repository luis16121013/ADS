

<div class="container-fluid">
  <div class="">
    <div class="row">
      <div class="col-9">
        <input class="form-control " id="myInput" type="text" placeholder="Search..">
      </div>
      <div class="col-2">
        <a id="addRegister" class="btn btn-info" href="#" data-toggle="modal" data-target="#formPOST">
          <img src="assets/icon/addUserTeacher2.svg" class="p-0" style="width: 30px;">
        </a>
      </div>
    </div>
  </div>

  <div class="contanier" style="overflow:auto;">
      <table class="table table-hover table-bordered mt-3">
        <thead class="bg-dark text-white">
          <tr>
            <th>apellido</th>
            <th>nombre</th>
            <th>email</th>
            <th>contacto</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody id="myTable" class="bg-secondary text-white">
            <!-- contenido DOCENTE API -->
        </tbody>
      </table>
  </div>
 
  <ul id="table-pagination-global" class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>

  <?php require_once('FormPost.php'); ?>
  
</div>


<!-- PINRT THE MODAL FOR VIEW TABLE BY BUTTON -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalLabel">Informacion Personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- desde aqui comienza el formulario -->

        <div class="container">
          <form id="formulario-info-update">
          <div class="form-row">
            <div class="form-group col-6 col-sm-3 col-md-3">
              <label class="text-danger" for="inputIDUSER">Id Usuario</label>
              <input type="text" class="form-control" id="inputIDUSER" placeholder="iduser" disabled>
            </div>
            <div class="form-group col-6 col-sm-2 col-md-3">
              <label class="text-danger" for="inputID">Id</label>
              <input type="text" class="form-control" id="inputID" placeholder="id" disabled>
            </div>
            <div class="form-group col-sm-7 col-md-6">
              <label class="text-danger" for="inputCODIGO">Codigo</label>
              <input type="text" class="form-control" id="inputCODIGO" placeholder="codigo" disabled>
            </div>

            <div class="form-group col-md-6">
              <label class="text-primary" for="inputNombres">Nombres</label>
              <input type="text" class="form-control" id="inputNombres" placeholder="Nombres" maxlength="30">
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary" for="inputApellidos">Apellidos</label>
              <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos" maxlength="30">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="text-primary" for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label class="text-primary" for="inputPassword">Password</label>
              <!-- falta implementar para previsualizar la contraseña-->
              <input type="text" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label class="text-primary" for="inputContacto">Contacto</label>
            <input type="text" class="form-control" id="inputContacto" placeholder="telefono o celular" maxlength="15">
          </div>
          <div class="form-group">
            <label class="text-primary" for="inputDomicilio">Domicilio</label>
            <input type="text" class="form-control" id="inputDomicilio" placeholder="Jr ejemplo 888">
          </div>

          <div class="form-row">

            <!-- QUITANDO INPUT CIUDAD
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            -->

            <div class="form-group col-md-4">
              <label class="text-primary" for="opcion">Sexo</label>
              <select id="opcion" name="sexo" class="form-control">
                <option selected>Opcion</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
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
        <button id="update" type="button" class="btn btn-primary">guardar cambios</button>
      </div>
    </div>
  </div>
</div> 


