<!-- menu perfil---------------------------------------------------- -->
<div class="content-wrapper " style="">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="assets/img/DocentePred.jpeg"
                       style="width:60%;border-radius:50%;">
                </div>

                <h3 class="profile-username text-center">Docente</h3>

                <?php 
                //PASANDO VARIABLE JS DESDE PHP
                $id=$_SESSION['ID'];
                echo "<script>let idRegistro=$id</script>";
                ?>

                <ul id="listado-datos" class="list-group list-group-unbordered mb-3" >
                    <!-- rellenar datos del usuario API -->
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!--li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Informes</a></li-->
        
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Info. adicional</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!--div class="active tab-pane" id="activity">
                        <div class="media border p-3" style="border-radius: 15px;">
                          <img src="assets/icon/docente-icono.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                          <div class="media-body">
                            <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p> 
                          </div>
                        </div>
                  </div-->

                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Contacto</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="celular y/o telefono">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button id="infoAdicional" type="submit" class="btn btn-danger">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>