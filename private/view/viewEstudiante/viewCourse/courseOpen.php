<?php 


?>
<div class="container-fluid">

  <div class="row">

    <div id="accordion" class="col-lg-3 py-1">

      <div class="card ">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse " href="#collapseOne">
             <strong>-Informacion general</strong>
          </a>
        </div>
        <div id="collapseOne" class="collapse show" data-parent="#">
          <div class="card-body">
          <strong>Responsable de asignatura:</strong>
          MAQUERA RAMIREZ, JOAB
          </div>
        </div>
      </div>

      <div class="card ">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#collapseTwo">
             <strong>-Informacion alumno </strong> 
          </a>
        </div>
        <div id="collapseTwo" class="collapse show" data-parent="#">
          <div class="card-body">
          <p><strong>-Nivel academico: </strong> PRIMARIA</p>
            <p><strong>-Grado: </strong> 5TO</p>
            <p><strong>-Seccion: </strong>B</p>
          </div>
        </div>
      </div>



    </div>

    <div class="col-lg-9">
        <div class="container-fluid " >

            <div class="row">

                <div class="col-md-4 ">
                    <div class="card mb-4 shadow-sm ">
                        <img src="assets/icon/unidades.svg" style="width:70%;">
                        <div class="card-body">
                        <p class="card-text"><strong><h3>Unidades</h3></strong></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a class="btn btn-lg btn-outline-primary" href="?a=goCourse&c=Math">Ver</a>
                            
                            </div>
                            <!--small class="text-muted">9 mins</small-->
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="assets/icon/task.svg" style="width:95%;">
                        <div class="card-body">
                            <p class="card-text"><strong><h3>Tareas</h3></strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group ">
                                <a class="btn btn-lg btn-outline-primary " href="?a=goTaskCourse&c=<?php echo $course; ?>">Ver</a>
                                
                                </div>
                                <!--small class="text-muted">9 mins</small-->
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="assets/icon/calification.svg" style="width:78%;">
                        <div class="card-body">
                            <p class="card-text"><strong><h3>Calificaciones</h3></strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a class="btn btn-lg btn-outline-primary" href="?a=goCourse&c=Comunication">Ver</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

  </div>

</div>


