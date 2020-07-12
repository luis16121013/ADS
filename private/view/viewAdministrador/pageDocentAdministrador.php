
<div class="container-fluid">
  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div class="contanier" style="overflow:auto;">
      <table class="table table-hover table-bordered mt-3">
        <thead class="bg-dark text-white">
          <tr>
            <th>codigo</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>email</th>
            <th>contacto</th>
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