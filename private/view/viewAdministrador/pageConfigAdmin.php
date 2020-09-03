
<div class="container-fluid">
  <div class="">
    <div class="row">
      <div class="col-9">
        <input class="form-control " id="inputBrowser" type="text" placeholder="Search..">
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

<?php require_once('FormPut.php'); ?>

        <!-- aqui teermina el formulario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button id="update" type="button" class="btn btn-primary">guardar cambios</button>
      </div>
    </div>
  </div>
</div> 