<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    include 'user.php';
    $userid = $_SESSION['userinfo']['uniqueid'];
    $questionid = $_POST['qid'];
    $answerid = $userid.$questionid;
    $content = $_POST['content'];
//    echo $_POST['content'];
    $tagid = $_POST['tagid1'];
    $sql = "USE  userdata;";
    $sql .= "INSERT INTO answers_master(userid,questionid,answerid,content,tagid1";
    date_default_timezone_set('Asia/Kolkata');
    $sql .= ") VALUES ('".$userid."','".$questionid."','".$answerid."','".$content."','".$tagid."'";

    $sql .= ");";

    try{
        $conn= new PDO('mysql:host:localhost;dbname:userdata','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conn->query($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>

