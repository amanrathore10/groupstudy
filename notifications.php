<?php

if($_SERVER['REQUEST_METHOD']='POST'){
    session_start();
//    $sql = "SELECT *,(SELECT content FROM answers_master WHERE answerid=notifications_master.answerid) FROM notifications_master WHERE userid ='".$_SESSION['userinfo']['uniqueid']."';";
//    $sql = "SELECT *,(SELECT content FROM answers_master as cont WHERE answerid=notifications_master.answerid) FROM notifications_master";
//      $sql ="SELECT *,SUBSTRING((SELECT content FROM answers_master WHERE answerid=notifications_master.answerid),7,27) AS content FROM notifications_master ORDER BY createdat DESC  LIMIT ".$_POST['limit']." OFFSET ".$_POST['offset'].";";
        if(isset($_POST['type'])&&$_POST['type']=='shownotif'){
            $sql = "SELECT*,(SELECT count(*) FROM notifications_master WHERE flag='0' AND userid=".$_SESSION['userinfo']['uniqueid'].") AS count,( CASE WHEN (notifications_master.notiftype='upvote') THEN SUBSTRING((SELECT content FROM answers_master WHERE answerid=notifications_master.answerid) ,7,27)
         WHEN (notifications_master.notiftype='answer') THEN SUBSTRING((SELECT question_content FROM questions_master WHERE questionid=(SELECT questionid FROM answers_master WHERE answerid=notifications_master.answerid)),1,20) WHEN (notifications_master.notiftype='request') THEN SUBSTRING((SELECT question_content FROM questions_master WHERE questionid=notifications_master.answerid),1,20) END ) AS content FROM notifications_master WHERE userid=".$_SESSION['userinfo']['uniqueid']." ORDER BY createdat DESC  LIMIT ".$_POST['limit']." OFFSET ".$_POST['offset'].";";
            try{
//            echo $sql;
                $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $result = $conn->query($sql);
                $result = $result->fetchAll(PDO::FETCH_ASSOC);

                print_r(json_encode($result));
                $sql = "UPDATE notifications_master SET flag = '1' WHERE createdat<=now() AND userid =".$_SESSION['userinfo']['uniqueid'].";";
                $result = $conn->query($sql);

            }catch(PDOException $e){
                echo $e->getMessage();
                echo false;
            }
        }
        if(isset($_POST['type'])&&$_POST['type']=='checknotif'){
            $sql = "SELECT count(*)as newnotifs FROM notifications_master  WHERE (createdat<=now() AND userid ='".$_SESSION['userinfo']['uniqueid']."' AND FLAG='0');";
            try{
                $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $result = $conn->query($sql);
                $result = $result->fetchAll(PDO::FETCH_ASSOC);
//                echo $sql;
                print_r(json_encode($result));
            }catch(PDOException $e){
                echo $e->getMessage();
                echo false;
            }

        }
}
else {
    echo false;
}
?>

