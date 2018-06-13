<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        session_start();
        include 'user.php';
        $sql = "USE  userdata;";
        $sql .= "INSERT INTO questions_master(question_content,questionid,userid";
        $i=0;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=str_replace('-',"",date('d-m-y h-i-s'));
        $timestamp = str_replace(' ','',$timestamp);
        $questionid = "qid".$_SESSION['userinfo']['uniqueid'].$timestamp;
        echo $questionid;
        while($i < sizeof($_POST['tags'])){
            $sql .= ",tagid".($i+1)."";
            $i++;
        }
        $sql .= ") VALUES ('".$_POST['question']."',"."'".$questionid."',"."'".$_SESSION['userinfo']['uniqueid']."'";
        $j=0;

        while($j < sizeof($_POST['tags'])){
            $pre = ",'";
            $sql .= $pre.$_POST['tags'][$j]."'";
            $j++;
        }
        $sql .= ");";
        echo $sql;
        try{
            $conn= new PDO('mysql:host:localhost;dbname:userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conn->query($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

?>