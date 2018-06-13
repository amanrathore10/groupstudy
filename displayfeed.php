<?php
if($_SERVER['REQUEST_METHOD']='GET'){
//        print_r(json_encode($_GET['filteredsubjects'])) ;

    $sql = "SELECT (SELECT COUNT(*) FROM upvotetable WHERE answerid = answers_master.answerid AND upvote = '1' ) AS upvoteno,answers_master.userid,(SELECT photourl from userdetails_master WHERE uniqueid = answers_master.userid)as photourl,(SELECT name from userdetails_master WHERE uniqueid = answers_master.userid)as username,(SELECT city from userdetails_master WHERE uniqueid = answers_master.userid)as city,answers_master.questionid,answers_master.answerid,questions_master.question_content,answers_master.content,answers_master.createdat FROM (answers_master JOIN questions_master ON answers_master.questionid = questions_master.questionid) LEFT JOIN upvotetable ON answers_master.answerid = upvotetable.answerid WHERE "."answers_master.createdat <= ".$_GET['now']."  AND (";
    $i=0;
//        echo$_GET['now'];
    while($i<sizeof($_GET['filteredsubjects'])){
        $pre = $i>0?' OR ':'';
        $sql .= $pre."questions_master.tagid1='".$_GET['filteredsubjects'][$i]."'";
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
else {
    echo false;
}
?>
