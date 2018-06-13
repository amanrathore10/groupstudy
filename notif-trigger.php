<?php


    try{
        $conn = new PDO("mysql::host=localhost;",'root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "USE userdata;";
        $sql .= "CREATE TRIGGER IF NOT EXISTS uvnotifs  AFTER INSERT ON upvotetable FOR EACH ROW INSERT INTO notifications_master(userid,answerid,notiftype,flag) VALUES((SELECT userid FROM answers_master WHERE answerid = NEW.answerid),NEW.answerid,'upvote','0');";
        $sql .= "CREATE TRIGGER IF NOT EXISTS reqnotifs  AFTER INSERT ON answer_request FOR EACH ROW INSERT INTO notifications_master(userid,answerid,notiftype,flag) VALUES(NEW.requestedfrom,NEW.questionid,'request','0');";
        $sql .= "CREATE TRIGGER IF NOT EXISTS ansnotifs  AFTER INSERT ON answers_master FOR EACH ROW INSERT INTO notifications_master(userid,answerid,notiftype,flag) VALUES((SELECT userid FROM answers_master WHERE answerid = NEW.answerid),NEW.answerid,'answer','0');";

        $conn->exec($sql);
        echo $sql;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

?>