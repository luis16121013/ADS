<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']=='administrador'){
            echo "<script src='assets/js/mainAdmin.js'></script>";
        }else if($_SESSION['usuario']=='Docente'){
            echo "<script src='assets/js/mainDocente.js'></script>";
        }else if($_SESSION['usuario']=='Estudiante'){
            echo "<script src='assets/js/Estudiante.js'></script>";
        }
    }
?>
</body>
</html>