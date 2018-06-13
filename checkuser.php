<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email = input_data($_POST['email']);
        $name = input_data($_POST['name']);
        $photourl = $_POST['photourl'];
        $userdata = array('email'=>$email,'name'=>$name,'photourl'=>$photourl);

        include 'user.php';
        $user = new user();

        session_start();
        if(empty($email)){
            $_SESSION['status']['type']="error";
            $_SESSION['status']['msg'] = "login error";
        }
        else{
            $user->_createconn();
            $conditions['where']=array('email'=>$email);
            $conditions['return_type']='count';

            $prevUser = $user->getrows($conditions);
//            print_r($prevUser);
//
//            echo "a1......";

            if($prevUser>0){
                $_SESSION['status']['type']="login";
                $_SESSION['status']['msg'] = "Not a new user";
//                echo $_SESSION['status']['msg'];

            }else{
                $insert = $user->insert($userdata);
//                print_r($insert);
                if($insert!==FALSE){
                    $_SESSION['status']['type']="success";
                    $_SESSION['status']['msg']="userinfo inserted successfully";
//                    echo $_SESSION['status']['msg'];
                }else{
                    $_SESSION['status']['type']="error";
                    $_SESSION['status']['msg']="data insertion failed";
//                    echo $_SESSION['status']['msg'];
                }

            }
        }




    }else{
//        echo "errrrr";
    }

    function input_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>