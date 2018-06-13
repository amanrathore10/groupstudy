<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_SESSION)){
    $data = json_decode($_POST['ids']);

    $j = 0 ;
    $sql = "USE userdata;";
    $sql .= "INSERT INTO answer_request(requester,requestedfrom,questionid) VALUES";
    print_r($_POST);
    while($j<sizeof($data)){
        $pre = $j>0?",":" ";
        $sql .= "".$pre."('".$_SESSION['userinfo']['uniqueid']."','".$data[$j]."','".$_POST['qid']."')";
        $j++;
    }
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