<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="private/assets/css/bootstrap.css">
    <link rel="stylesheet" href="private/assets/css/myStyle.css">
    <title>app Escolar</title>
    <link rel="shortcut icon" href="private/assets/icon/EscuelaVirtual.png"/>
</head>
<body class="full-cover-background" style="background-image:url(private/assets/img/font-login.jpg);">
    <div class="container fondo" style="height:100vh;">
          <p class="text-center pt-5"><
            <img src="private/assets/img/imgLoguin.png" width="100" height="100">
          </p> 
        <div class=" mt-2 mb-2">
            <form class="" action="index.php" method="post" enctype="multipart/form-data">
                  <div class="text-center">
                     <select class="m-1 " required name="cargo" style="text-decoration:none;">
                        <option value="" disabled="" selected="">Tipo de usuario</option>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Docente">Docente</option>
                        <option value="Administrador">Administrador</option>
                     </select>
                  </div>
                  <div class="text-center">
                    <input class="m-1" type="text" required name="id" placeholder="USER-ID ejemplo:A001"><br>
                    <input class="m-1" type="password" required name="pass" placeholder="password"><br>
                    <button class="btn btn-danger m-1" type="submit" name="ingresar">Ingresar </button>
                  </div>
             </form>
        </div>
        <?php
        if(isset($rs)){
        ?>
          <div class="alert alert-danger alert-dismissible fade show " style="width:40%; margin:auto;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> Contraseña y/o usuario incorrecto.
          </div> 

        <?php
        }
        ?> 
    </div>

    <script src="private/assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="private/assets/js/popper.min.js"></script>
    <script src="private/assets/js/bootstrap.min.js"></script>
</body>
</html>