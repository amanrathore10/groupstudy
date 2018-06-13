<?php
if($_SERVER['REQUEST_METHOD']='GET'){
    session_start();
//    print_r($_GET);
    if(isset($_GET['type']) && $_GET['type']=='question'){
        $sql = "SELECT DISTINCT (SELECT count(*) FROM answers_master WHERE answers_master.questionid=questions_master.questionid) as answerCount,(SELECT count(*) FROM upvotetable WHERE answerid = answers_master.answerid AND upvote ='1')as upvoteCount,(SELECT count(*) FROM answer_comments WHERE answerid = answers_master.answerid)as commentCount, questions_master.questionid,answers_master.answerid,questions_master.question_content,(answers_master.content) FROM ( answers_master INNER JOIN questions_master ON answers_master.questionid= questions_master.questionid) WHERE questions_master.userid  = '".$_SESSION['userinfo']['uniqueid']."'";
        $sql .= "   ;";

        try{
//            echo $sql;
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_GET['type']) && $_GET['type']=='answer'){

        $sql = "SELECT DISTINCT (SELECT count(*) FROM answers_master WHERE answers_master.questionid=questions_master.questionid) as answerCount,(SELECT count(*) FROM upvotetable WHERE answerid = answers_master.answerid AND upvote ='1')as upvoteCount,(SELECT count(*) FROM answer_comments WHERE answerid = answers_master.answerid)as commentCount, questions_master.questionid,answers_master.answerid,questions_master.question_content,(answers_master.content) FROM ( answers_master INNER JOIN questions_master ON answers_master.questionid= questions_master.questionid) WHERE answers_master.userid  = '".$_SESSION['userinfo']['uniqueid']."'";
        $sql .= "   ;";

        try{
//            echo $sql;
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_GET['type']) && $_GET['type']=='userinfo'){

        $sql = "SELECT (SELECT count(*) from followers WHERE userid='".$_SESSION['userinfo']['uniqueid']."')as followerscount,name,city,phoneno,dob,country,gender,tagline FROM userdetails_master WHERE uniqueid = '".$_SESSION['userinfo']['uniqueid']."'";


        try{
//            echo $sql;
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else {
        echo false;
    }
}
if($_SERVER['REQUEST_METHOD']='POST'){
//    print_r($_POST);
    if(isset($_POST['name'])||isset($_POST['dob'])||isset($_POST['city'])||isset($_POST['country'])||isset($_POST['tagline'])||isset($_POST['date'])){
//        print_r($_POST);
        $sql = "UPDATE userdetails_master SET name= '".$_POST['name']."',city='".$_POST['city']."',phoneno='".$_POST['phoneno']."',dob='".$_POST['dob']."',country='".$_POST['country']."',gender='".$_POST['gender']."',tagline='".$_POST['tagline']."'  WHERE uniqueid = '".$_SESSION['userinfo']['uniqueid']."'";


        try{
            print_r($sql) ;
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
//            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            print_r($result) ;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else{
        echo false;
    }

}else {
    echo false;
}
?>
