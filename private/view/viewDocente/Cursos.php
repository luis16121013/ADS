
<div class="album py-3 " style="margin:0 20px 0 20px;">
  <div class="container-fluid " >

    <div class="row">
<!--
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
          <div class="card mb-4 shadow-sm ">
            <p class="text-center mb-0"><img src="assets/icon/math.svg" style="width:180px; height:150px;"></p>
            <div class="card-body pt-0 pt-0">
              <p class="card-text "><strong><h3 class="text-center">Matematica</h3></strong></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group " style="margin:auto;">
                  <a class="btn btn-sm btn-outline-primary createTask" href="#" data-toggle="modal" data-target="#formPOST">Crear Tarea</a>
                  <a class="btn btn-sm btn-outline-primary" href="?a=goTaskCourse&c=Math">Ver tareas</a>
                </div>
                <!-small class="text-muted">9 mins</small->
              </div>
            </div>
          </div>
      </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
          <div class="card mb-4 shadow-sm">
            <p class="text-center mb-0"><img src="assets/icon/EducationFisica.svg" style="width:180px; height:150px;"></p>
            <div class="card-body pt-0">
              <p class="card-text"><strong><h3 class="text-center">Educacion Fisica</h3></strong></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group "style="margin:auto;">
                  <a class="btn btn-sm btn-outline-primary createTask" href="#" data-toggle="modal" data-target="#formPOST">Crear Tarea</a>
                  <a class="btn btn-sm btn-outline-primary" href="?a=goTaskCourse&c=PhysicalEducation">Ver tareas</a>
                </div>
                <-small class="text-muted">9 mins</small->
              </div>
            </div>
          </div>
        </div>
       
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
          <div class="card mb-4 shadow-sm">
            <p class="text-center mb-0"><img src="assets/icon/comunication.svg" style="width:180px; height:150px;"></p>
            <div class="card-body pt-0">
            <p class="card-text"><strong><h3 class="text-center">Comunicacion</h3></strong></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group" style="margin:auto;">
                  <a class="btn btn-sm btn-outline-primary createTask" href="#" data-toggle="modal" data-target="#formPOST">Crear Tarea</a>
                  <a class="btn btn-sm btn-outline-primary" href="?a=goTaskCourse&c=Comunication">Ver tareas</a>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
          <div class="card mb-4 shadow-sm">
            <p class="text-center mb-0"><img src="assets/icon/personalSocial.svg" style="width:180px; height:150px;"></p>
            <div class="card-body pt-0">
              <p class="card-text"><strong><h3 class="text-center">Personal Social</h3></strong></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group" style="margin:auto;">
                  <a class="btn btn-sm btn-outline-primary createTask" href="#" data-toggle="modal" data-target="#formPOST">Crear Tarea</a>
                  <a class="btn btn-sm btn-outline-primary" href="?a=goTaskCourse&c=SocialPerson">Ver tareas</a>
                </div>
                <!-small class="text-muted">9 mins</small->
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
          <div class="card mb-4 shadow-sm">
            <p class="text-center mb-0"><img src="assets/icon/cienciaAmbiente.svg" style="width:180px; height:150px;"></p>
            <div class="card-body pt-0">
              <p class="card-text"><strong><h3 class="text-center">Ciencia y ambiente</h3></strong></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group" style="margin:auto;">
                  <a class="btn btn-sm btn-outline-primary createTask" href="#" data-toggle="modal" data-target="#formPOST">Crear Tarea</a>
                  <a class="btn btn-sm btn-outline-primary" href="?a=goTaskCourse&c=ScienceAndEnvironment">Ver tareas</a>
                </div>
                <!-small class="text-muted">9 mins</small->
              </div>
            </div>
          </div>
        </div>
-->


<?php foreach($rs as $course):
    include('viewCourse/course.php');
?>
<?php endforeach; ?>
    </div>
    <?php echo $hello; ?>
    <?php require_once('viewCourse/FormTaskPost.php'); ?>
  </div>

</div>
