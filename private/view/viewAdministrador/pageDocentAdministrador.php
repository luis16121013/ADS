
<div class="container-fluid">
  <div class="">
    <div class="row">
      <div class="col-9">
        <input class="form-control " id="myInput" type="text" placeholder="Search..">
      </div>
      <div class="col-2">
        <a class="btn btn-info" href="#">
          <img src="assets/icon/refresh.svg" class="p-0" style="width: 25px;">
        </a>
      </div>
    </div>
  </div>
  <div class="contanier" style="overflow:auto;">
      <table class="table table-hover table-bordered mt-3">
        <thead class="bg-dark text-white">
          <tr>
            <th>codigo</th>
            <th>nombre</th>
            <th>apellido</th>
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

</div>


<!-- PINRT THE MODAL FOR VIEW TABLE BY BUTTON -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
            <div class="form-group col-md-6">
              <label for="inputNombres">Nombres</label>
              <input type="text" class="form-control" id="inputNombres" placeholder="Nombres">
            </div>
            <div class="form-group col-md-6">
              <label for="inputApellidos">Apellidos</label>
              <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputContacto">Contacto</label>
            <input type="text" class="form-control" id="inputContacto" placeholder="telefono o celular">
          </div>
          <div class="form-group">
            <label for="inputDomicilio">Domicilio</label>
            <input type="text" class="form-control" id="inputDomicilio" placeholder="Jr ejemplo 888">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Sexo</label>
              <select id="inputState" class="form-control">
                <option selected>Opcion</option>
                <option>Masculino</option>
                <option>Femenino</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        </div>

        <!-- aqui teermina el formulario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> 