<?php
if($_SERVER['REQUEST_METHOD'] = 'GET' && isset($_GET['answerid'])){
    session_start();
    $query = "SELECT * FROM upvotetable WHERE answerid='".$_GET['answerid']."'";
//    print_r($_GET);
    if(isset($_GET['upvotestatus']) && $_GET['upvotestatus'] == 'upvoted'){
        $upid = "upid".$_GET['answerid'].$_SESSION['userinfo']['uniqueid'];
        $sql = "INSERT INTO upvotetable(userid,answerid,questionid,upvote,bookmark,upid) VALUES('".$_SESSION['userinfo']['uniqueid']."','".$_GET['answerid']."','".$_GET['questionid']."','0','0','".$upid."') ON DUPLICATE KEY UPDATE upvote='0'";

        try{
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        $result=$conn->query($query)->fetch();
//        print_r($result);
//        if($result===FALSE){
            $result = $conn->query($sql);
//            echo $sql;
            print_r($result);
//            $_GET['upvotestatus'] = '';

//        }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_GET['upvotestatus']) && $_GET['upvotestatus'] == 'not_upvoted'){
        session_start();
        $upid = "upid".$_GET['answerid'].$_SESSION['userinfo']['uniqueid'];
        $sql = "INSERT INTO upvotetable(userid,answerid,questionid,upvote,bookmark,upid) VALUES('".$_SESSION['userinfo']['uniqueid']."','".$_GET['answerid']."','".$_GET['questionid']."','1','0','".$upid."') ON DUPLICATE KEY UPDATE upvote='1'";

        try{
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        $result=$conn->query($query)->fetch();
//        print_r($result);
//        if($result===FALSE){
            $result = $conn->query($sql);
//            echo $sql;
            echo 'upvoted';
            print_r($result);
//            $_GET['upvotestatus'] = '';
            echo $_GET['upvotestatus'].".......";
//        }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }if(isset($_GET['bookmarkstatus']) && $_GET['bookmarkstatus'] == 'bookmarked'){
        session_start();
        $upid = "upid".$_GET['answerid'].$_SESSION['userinfo']['uniqueid'];
        $sql = "INSERT INTO upvotetable(userid,answerid,questionid,upvote,bookmark,upid) VALUES('".$_SESSION['userinfo']['uniqueid']."','".$_GET['answerid']."','".$_GET['questionid']."','0','0','".$upid."') ON DUPLICATE KEY UPDATE bookmark='0'";
        try{
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        $result=$conn->query($query)->fetch();
//        print_r($result);
//        if($result===FALSE){
            $result = $conn->query($sql);
//            echo $sql;
            print_r($result);
//            $_GET['upvotestatus'] = '';

//        }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if(isset($_GET['bookmarkstatus'])&& ($_GET['bookmarkstatus'] == 'not_bookmarked')){
        session_start();
        $upid = "upid".$_GET['answerid'].$_SESSION['userinfo']['uniqueid'];
        $sql = "INSERT INTO upvotetable(userid,answerid,questionid,upvote,bookmark,upid) VALUES('".$_SESSION['userinfo']['uniqueid']."','".$_GET['answerid']."','".$_GET['questionid']."','0','1','".$upid."') ON DUPLICATE KEY UPDATE bookmark='1'";

        try{
            $conn= new PDO('mysql:host=localhost;dbname=userdata','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        $result=$conn->query($query)->fetch();
//        print_r($result);
//        if($result===FALSE){
            $result = $conn->query($sql);
//            echo $sql;

            print_r($result);
//            $_GET['upvotestatus'] = '';
//        }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
if(($_SERVER['REQUEST_METHOD']="POST")&& isset($_POST['type']) ) {
    session_start();
    if ($_POST['type'] == 'storecomment' && isset($_POST['answerid']) && isset($_POST['comment'])) {

        $sql = "INSERT INTO answer_comments(userid,answerid,comment) VALUES('".$_SESSION['userinfo']['uniqueid']."','".$_POST['answerid']."','".$_POST['comment']."');";
        echo $sql;
        try {
            $conn = new PDO('mysql:host=localhost;dbname=userdata', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    if ($_POST['type'] == 'showcomments' && isset($_POST['offset'])) {

        $sql = "SELECT answer_comments.*,userdetails_master.photourl FROM (answer_comments JOIN userdetails_master ON answer_comments.userid=userdetails_master.uniqueid )WHERE answer_comments.answerid ='".$_POST['answerid']."' ORDER BY createdat LIMIT 10 OFFSET " . $_POST['offset'] . ";";

        try {
            $conn = new PDO('mysql:host=localhost;dbname=userdata', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($result));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    if($_POST['type']=='follow' && isset($_POST['followedid'])){
        $sql = "INSERT INTO followers(userid,followedid) VALUES('".$_SESSION['userinfo']['uniqueid']."','".$_POST['followedid']."') ON DUPLICATE KEY DELETE;";
        print_r($_POST);
        try {
            $conn = new PDO('mysql:host=localhost;dbname=userdata', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->query($sql);
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($result));

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
