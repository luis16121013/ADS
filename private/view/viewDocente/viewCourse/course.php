<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
    <div class="card mb-4 shadow-sm ">
            <p class="text-center mb-0"><img src="assets/icon/<?php echo $course->urlImgCourse; ?>" style="width:180px; height:150px;"></p>
        <div class="card-body pt-0 pt-0">
                <p class="card-text "><strong><h3 class="text-center"><?php echo $course->nameCourse; ?></h3></strong></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group" style="margin:auto;">
                    <a id="<?php echo $course->id; ?>" class="btn btn-sm btn-outline-primary task" value="<?php echo $course->nameCourse; ?>" href="#" data-toggle="modal" data-target="#formPOST">Crear Tarea</a>
                    <a class="btn btn-sm btn-outline-primary" href="?a=goTaskCourse&c=Math">Ver tareas</a>
                </div>
                <!--small class="text-muted">9 mins</small-->
            </div>
        </div>
    </div>
</div>