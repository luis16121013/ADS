
<?php 
//falta configurar las rutas-Location
if(isset($_GET['a'])):
  /**
   * ROUTES NAV-PRINCIPLE TEACHERS 
   */
  $pages=array('PERFIL','CURSOS','GOCOURSE','GOTASKCOURSE');
  $page=strtoupper($_GET['a']);

 


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
              <li class="breadcrumb-item active"><?php echo $course;?></li>
              <li class="breadcrumb-item active">Tareas</li>
            <?php }else if($page==$pages[4]){ ?>
              <li class="breadcrumb-item active">Cursos</li>
            <?php } ?>
          </ul>
        </div>

    <?php    
  endif;
endif;
?>