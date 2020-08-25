<?php
class urlControllerCourse{
    public function __construct(){}

    /**
    * COURSES REGISTER OF TEACHERS
    */
    public function urlTaskController($conver=false){
        $courses=array('MATH','COMUNICATION','SOCIALPERSON','PHYSICALEDUCATION','SCIENCEANDENVIRONMENT');
        $course=null;
        if(isset($_GET['c'])){
            $course=strtoupper($_GET['c']);
            if(in_array($course,$courses)){
                if($conver){
                    return $_GET['c'];
                }else if($course==$courses[0]){
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
            }else{
                $course='';
            }
        }
        return $course;
    } 
}