<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>app Escolar</title>
    <link rel="stylesheet" href="private/assets/css/bootstrap.css">
    <link rel="stylesheet" href="private/assets/css/myStyle.css">
    <link rel="stylesheet" href="private/lib/sweetAlert2/sweetalert2.min.css">
    <script src="private/lib/sweetAlert2/sweetalert2.all.min.js"></script>
    <link rel="shortcut icon" href="private/assets/icon/EscuelaVirtual.png"/>
</head>
<body class="bg-dark">
<div class="container text-center text-white">

        <h2 class="pt-5"><strong>APP ESCOLAR</strong></h2>

    <div class="row pt-3"><!-- comienza fila del formulario -->
        <div class="col-sm-12 col-md-3 col-lg-4"></div>
        <div class="col-sm-12 col-md-6 col-lg-4 border" style="border-radius: 25px;">
            
            <h2 class="pt-2"><strong>Login</strong></h2>
            <p class="text-center">
               <img  class="" src="public/icons/undraw_Login_v483.svg" style="width: 25%;"> 
            </p>

            <form action="#index.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" required name="id" placeholder="Codigo">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control"  required name="pass" placeholder="Password">
                </div>

                <div class="form-group">
                    <select required name="cargo" class="form-control">
                        <option value="" disabled="" selected="">Tipo de usuario</option>
                        <option value="Estudiante" >Estudiante</option>
                        <option value="Docente" >Docente</option>
                        <option value="Administrador" >Administrador</option>
                    </select>
                </div>
                <button type="submit" name="ingresar" class="btn btn-primary mb-5">Ingresar</button>
            </form>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-4"></div>
    </div><!-- termina la fila para el formulario -->
        <?php
            if(isset($rs)){
            ?>
                <script>
                    Swal.fire({
                        type:'error',
                        title:'Error',
                        text:'contraseña y/o usuario incorrecto.'
                    })
                </script>
            <?php
            }
        ?>
</div>

    <script src="private/assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="private/assets/js/popper.min.js"></script>
    <script src="private/assets/js/bootstrap.min.js"></script>
    
</body>
</html>