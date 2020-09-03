<?php
if($page=='LoadPagePerfil'){
    echo "<script src='assets/js/admin/pagePerfilAdmin.js'></script>";
}else if($page=='LoadPageTeacher'){
    echo "<script src='assets/js/ResolveMethod.js'></script>";
    echo "<script src='assets/js/admin/pageConfigTeacher.js'></script>";
}else if($page=='LoadPageAdmin'){
    echo "<script src='assets/js/ResolveMethod.js'></script>";
    echo "<script src='assets/js/admin/pageConfigAdmin.js'></script>";
}