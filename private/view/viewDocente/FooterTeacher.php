<?php
if($page=='LoadPagePerfil'){
    //echo "<script src='assets/js/admin/pagePerfilAdmin.js'></script>";
}else if($page=='LoadPageCourses'){
    echo "<script src='assets/js/ResolveMethod.js'></script>";
    echo "<script src='assets/js/teacher/pageCoursesTeacher.js'></script>";
}else if($page=='LoadPageAdmin'){
    echo "<script src='assets/js/ResolveMethod.js'></script>";
    echo "<script src='assets/js/admin/pageConfigAdmin.js'></script>";
}