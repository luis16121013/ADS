
<?php 
//falta configurar las rutas-Location
if(isset($_GET['a'])):
  /**
   * ROUTES NAV-PRINCIPLE TEACHERS 
   */
  $pages=array('PERFIL','CURSOS','GOCOURSE','GOTASKCOURSE');
  $page=strtoupper($_GET['a']);

  /**
   * COURSES REGISTER OF TEACHERS
   */
  $courses=array('MATH','COMUNICATION','SOCIALPERSON','PHYSICALEDUCATION','SCIENCEANDENVIRONMENT');
  $course='';
  if(isset($_GET['c'])){
    $course=strtoupper($_GET['c']);
    if(in_array($course,$courses)){
      if($course==$courses[0]){
        $course="Matemática";
      }else if($course==$courses[1]){
        $course="Comunicación";
      }else if($course==$courses[2]){
        $course="Personal social";
      }else if($course==$courses[3]){
        $course="Educación física";
      }else if($course==$courses[4]){
        $course="Ciencia y ambiente";
      }
    }
  }


  if(in_array($page,$pages)):
    ?>
        <div class="container-fluid " style="margin-top:70px;">
          <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="?a=inicio">Inicio</a></li>
            <?php if($page==$pages[0]){?>
              <li class="breadcrumb-item active">Perfil</li>
            <?php }else if($page==$pages[1]){ ?>
              <li class="breadcrumb-item active">Cursos</li>
            <?php }else if($page==$pages[2]){ ?>
              <li class="breadcrumb-item active"><a href="?a=cursos">Cursos </a></li>
              <li class="breadcrumb-item active"><?php echo $course;?></li>
            <?php }else if($page==$pages[3]){ ?>
              <li class="breadcrumb-item active"><a href="?a=cursos">Cursos </a></li>
              <li class="breadcrumb-item active">Tareas</li>
              <li class="breadcrumb-item active"><?php echo $course;?></li>
            <?php }else if($page==$pages[4]){ ?>
              <li class="breadcrumb-item active">Cursos</li>
            <?php } ?>
          </ul>
        </div>

    <?php    
  endif;
endif;
?>