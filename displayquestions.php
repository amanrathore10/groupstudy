<?php
    if($_SERVER['REQUEST_METHOD']='GET'){
//        print_r(json_encode($_GET['filteredsubjects'])) ;

        $sql = "SELECT questionid,tagid1,question_content,createdat FROM questions_master WHERE "."createdat <= ".$_GET['now']."  AND (";
        $i=0;
//        echo$_GET['now'];
        while($i<sizeof($_GET['filteredsubjects'])){
            $pre = $i>0?' OR ':'';
            $sql .= $pre."tagid1='".$_GET['filteredsubjects'][$i]."'";
            $i++;
        }
        $sql .= " ) ORDER BY (createdat) desc LIMIT ".$_GET['limit']." OFFSET ".$_GET['offset'].";";

        try{
//            echo $sql;
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
//            echo $sql;
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($result));
        }catch(PDOException $e){
            echo false;
        }
    }
    else{
        echo false;
    }

?>
