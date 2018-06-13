<?php
if($_SERVER['REQUEST_METHOD']='GET'){
    $searchTerm = $_GET['term'];
    $sql = "SELECT name,uniqueid,photourl FROM userdetails_master WHERE name LIKE '%".$searchTerm."%' ORDER BY name ASC";
    try{
        $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $result = $conn->query($sql);

        $data = $result->fetchALL(PDO::FETCH_ASSOC);

        print_r(json_encode($data));

    }catch(PDOException $e){

    }
}
?>

