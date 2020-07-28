<?php
if(isset($_GET['url'])){
    require_once('src/controller/controller.php');
    $url=$_GET['url'];
    echo $url;
		/*
    $number=intval(preg_replace('/[^0-9]+/','',$url),10);
    header("content-type: application/json; charset=utf-8");

    if($_SERVER['REQUEST_METHOD']=='GET'){
        if($url=='users'){
            $r=new controller('users');
            print_r(json_encode($r->Users()));
            http_response_code(200);
        }else if($url=="users/$number"){
            $r=new controller('users');
            print_r(json_encode($r->UsersId($number)));
            http_response_code(200);
        }else if($url=='users/students'){
            $r=new controller('users'); 
            print_r(json_encode($r->getStudents()));
            http_response_code(200);
        }else if($url=='users/teachers'){
            $r=new controller('users'); 
            print_r(json_encode($r->getTeachers()));
            http_response_code(200);
        }else if($url=='users/admins'){
            $r=new controller('users'); 
            print_r(json_encode($r->getAdmins()));
            http_response_code(200);
        }else if($url=="users/students/$number"){
            $r=new controller('users'); 
            print_r(json_encode($r->getStudentsById($number)));
            http_response_code(200);
        }else if($url=="users/teachers/$number"){
            $r=new controller('users'); 
            print_r(json_encode($r->getTeachersById($number)));
            http_response_code(200);;
        }else if($url=="users/admins/$number"){
            $r=new controller('users'); 
            print_r(json_encode($r->getAdminsById($number)));
            http_response_code(200);;
        }
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        $postBody= file_get_contents("php://input");
        $json=json_decode($postBody,true);
            if(json_last_error()==0){
               if($url=='prueba'){
                $r=new controller('prueba');
                print_r(json_encode($r->prueba($json)));
                //print_r(json_encode("hola mundo"));

                print_r($json[0]['nombre']);
                //print_r(json_encode($json[0]['nombre']));
                http_response_code(200);
               } 
            }
    }else if($_SERVER['REQUEST_METHOD']=='PUT'){
        $postBody=file_get_contents("php://input");
        $json=json_decode($postBody,true);
            if(json_last_error()==0){
                if($url=="prueba"){
                    $r=new controller('prueba');
                    print_r(json_encode($r->updatePrueba($json)));
                    http_response_code(200);
                }
            }else{
                http_response_code(400);
            }
    }else if($_SERVER['REQUEST_METHOD']=='DELETE'){
        if($url=="prueba/$number"){
            $r=new controller('prueba');
            print_r(json_encode($r->deletePrueba($number)));
            http_response_code(200);
        }else{
            http_response_code(400);
        }
		}   */
}else{
    require_once('src/view/viewApi.html');
}
?>
