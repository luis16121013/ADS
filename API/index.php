<?php
if(isset($_GET['url'])){
    require_once('src/models/User.php');
    require_once('src/models/Admin.php');
    require_once('src/models/Teacher.php');
    require_once('src/models/Student.php');
    require_once('src/controller/controller.php');
    $url=$_GET['url'];
		
    $number=intval(preg_replace('/[^0-9]+/','',$url),10);
    header("content-type: application/json; charset=utf-8");

    if($_SERVER['REQUEST_METHOD']=='GET'){
       
        if($url=='users'){                      //table_users
            $r=new controller(new User);
            print_r(json_encode($r->getRegisterTable()));
            http_response_code(200);
        }else if($url=="users/$number"){
            $r=new controller(new User);
            print_r(json_encode($r->getRegisterById($number)));
            http_response_code(200);
        }else if($url=="users/validate/$number"){
            $r=new controller(new User);
            print_r(json_encode($r->validateRegister($number)));
            http_response_code(200);
        }
        else if($url=='students'){             //table_students
            $r=new controller(new Student); 
            print_r(json_encode($r->getRegisterTable()));
            http_response_code(200);
        }else if($url=="students/$number"){
            $r=new controller(new Student); 
            print_r(json_encode($r->getRegisterById($number)));
            http_response_code(200);
        }
        else if($url=='teachers'){             //table_teachers
            $r=new controller(new Teacher); 
            print_r(json_encode($r->getRegisterTable()));
            http_response_code(200);
        }else if($url=="teachers/prueba"){//HTTP UNIT TESTING IN GENERATE CODIG FOR USERS
            $r=new controller(new Teacher); 
            print_r(json_encode($r->prueba()));
            http_response_code(200);
        }else if($url=='teachers/count'){             //table_teachers
            $r=new controller(new Teacher); 
            print_r(json_encode($r->countRegister()));
            http_response_code(200);
        }else if($url=="teachers/$number"){     
            $r=new controller(new Teacher);      
            print_r(json_encode($r->getRegisterById($number)));
            http_response_code(200);
        }else if($url=="teachers/limit/$number"){     
            $r=new controller(new Teacher);      
            print_r(json_encode($r->getDataLimit($number)));
            http_response_code(200);
        }
        else if($url=='admins'){               //table_admins
            $r=new controller(new Admin); 
            print_r(json_encode($r->getRegisterTable()));
            http_response_code(200);
        }else if($url=="admins/$number"){
            $r=new controller(new Admin); 
            print_r(json_encode($r->getRegisterById($number)));
            http_response_code(200);;
        }
       
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        $postBody= file_get_contents("php://input");
        $json=json_decode($postBody,true);
            if(json_last_error()==0){
               if($url=='teachers'){
                $r=new controller(new Teacher);
                print_r(json_encode($r->insertData($json)));
                http_response_code(200);
               } 
            }

    }else if($_SERVER['REQUEST_METHOD']=='PUT'){
        $putBody=file_get_contents("php://input");
        $json=json_decode($putBody,true);
            if(json_last_error()==0){
                if($url=="teachers/$number"){
                    $r=new controller(new Teacher);
                    print_r(json_encode($r->updateTeacher($json)));
                    http_response_code(200);
                }
            }else{
                http_response_code(400);
            }
    }else if($_SERVER['REQUEST_METHOD']=='DELETE'){
        if($url=="users/$number"){
            $u=new controller(new User);
            print_r(json_encode($u->delete($number)));
            http_response_code(200);
        }else if($url=="teachers/$number"){
            $t=new controller(new Teacher);
            print_r(json_encode($t->delete($number)));
            http_response_code(200);
        }else{
            http_response_code(400);
        }
    }
       
}else{
    require_once('src/view/viewApi.html');
}
?>
