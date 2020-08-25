<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="lib/sweetAlert2/sweetalert2.all.min.js"></script>
<?php
    if(isset($_SESSION['usuario'])){
        echo "<script src='assets/js/config.js'></script>";
        if($_SESSION['usuario']=='Administrador'){
            //echo "<script src='assets/js/mainAdmin.js'></script>";
            echo "<script src='assets/js/Admin.js'></script>";
        }else if($_SESSION['usuario']=='Docente'){
            echo "<script src='assets/js/mainDocente.js'></script>";
        }else if($_SESSION['usuario']=='Estudiante'){
            echo "<script src='assets/js/Estudiante.js'></script>";
        }
    }
?>
</body>
</html>
