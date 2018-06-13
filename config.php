<?php

    try{

        $conn = new PDO("mysql::host=localhost",'root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS userdata;";
        $sql .= "USE userdata;";
        $sql .= "CREATE TABLE IF NOT EXISTS userdetails_master( 
                  uniqueid INT NOT NULL AUTO_INCREMENT,
                  name VARCHAR(50) NOT NULL,
                   email VARCHAR(50) NOT NULL ,
                  phoneno VARCHAR(12) ,
                  country VARCHAR(20) , 
                  city VARCHAR(20) ,
                  dob DATE , gender VARCHAR(5), photourl VARCHAR(300), tagline VARCHAR(100),
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY (uniqueid,email) );";
        $sql.= "CREATE TABLE IF NOT EXISTS upvotetable(
        userid VARCHAR (25) NOT NULL ,
        answerid VARCHAR (50) NOT NULL,
        questionid VARCHAR (25) NOT NULL,
        createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
        upvote VARCHAR (10),
        bookmark VARCHAR (10),
        upid VARCHAR (50),
        UNIQUE KEY(upid)
        
);";
        $sql .= "CREATE TABLE IF NOT EXISTS notifications_master(
        userid VARCHAR(25) NOT NULL,
        answerid VARCHAR (50) NOT NULL,
        notiftype VARCHAR (10) NOT NULL,
        createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
        flag VARCHAR (1) NOT NULL,
        PRIMARY KEY(userid,answerid)
        
);";
        $sql.="CREATE TABLE IF NOT EXISTS answer_comments(
                  userid VARCHAR(25) NOT NULL,
                  answerid VARCHAR (25) NOT NULL,
                  commentid INTEGER  AUTO_INCREMENT NOT NULL ,
                  comment VARCHAR (200) NOT NULL,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  UNIQUE KEY(commentid)
                  
        );";
        $sql.="CREATE TABLE IF NOT EXISTS followers(
                  userid VARCHAR(25) NOT NULL,
                  followedid VARCHAR (25) NOT NULL,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY(userid,followedid)
                  
        );";
        $sql.="CREATE TABLE IF NOT EXISTS answer_request(
                  requester VARCHAR(25) NOT NULL,
                  requestedfrom VARCHAR (25) NOT NULL,
                  questionid VARCHAR (25) NOT NULL,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY(questionid,requester,requestedfrom)
                  
        );";

        $sql.="CREATE TABLE IF NOT EXISTS answers_master(
                  userid VARCHAR(25) NOT NULL,
                  questionid VARCHAR (25) NOT NULL,
                  answerid VARCHAR (50) NOT NULL,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
                  lastedited TIMESTAMP ,
                  content VARCHAR (4000) NOT NULL,
                  tagid1 VARCHAR(25) NOT NULL,
                  isreported VARCHAR (10)
        );";
        $sql .= "ALTER TABLE userdetails_master AUTO_INCREMENT=1233;";

        $sql .= "INSERT INTO userdetails_master(uniqueid,name,email,photourl) VALUES ('1233','Pradumn Davey','pradumndavey@gmail.com','https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-1/p100x100/21727972_1425170637536691_3560176673943902642_n.jpg?_nc_cat=0&oh=076d1bd4bf56b07fcb955eb7f1eadedf&oe=5B6FAF74');";
        $sql .= "CREATE TABLE IF NOT EXISTS subjects_master(
                  subjectid VARCHAR (20) NOT NULL,
                  subjectname VARCHAR (20) NOT NULL,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  followers INT,
                  PRIMARY KEY(subjectid,subjectname)
              );";
        $subjects = ["Accounting","Agriculture","Algebra","Architecture","Art","Astronomy","Biology","Botany","Business","Business Stud","Calculus","Chemistry","Civics","Commerce","Computer","Design","Drama","Earth Science","Economics","Electricity","Electronics","English","Environmental Sci","Finance","Forensic","Geography","Geology","Geometry","Grammar","Health","Hindi","History","Inorganic Chemistry","Journalism","Language","Law","Literature","Macroeconomics","Magnetism","Management","Marine","Maths","Mechanics","Microeconomics","Music","Nutrition","Organic Chemistry","Philosophy","Photography","Physical Chemistry","Physical Edu","Physics","Poetry","Political Sci","Psychology","Religion","Renaissance","Robotics","Science","Social Sci","Social Std","Sociology","Statistics","Stories","Trigonometry","Zoology"];
        $sql .= "INSERT INTO subjects_master(subjectid,subjectname) VALUES";
        $index = 0;
        while($index<sizeof($subjects)){
            $pre = $index>0?"'),('":"('";
            $sql .= $pre.$subjects[$index]."','".$subjects[$index];
            $index++;

        }
        $sql .= "');";

        $sql .= "'');";
        $sql.= "CREATE TABLE IF NOT EXISTS questions_master(
                  questionid VARCHAR(25) NOT NULL,
                  userid VARCHAR (25) NOT NULL,
                  tagid1 VARCHAR (25) NOT NULL,
                  tagid2 VARCHAR (25) NOT NULL,
                  tagid3 VARCHAR (25) NOT NULL,
                  followers INT ,
                  question_content VARCHAR (2000) NOT NULL,
                  answers_count INT ,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                  isreported VARCHAR(10) ,
                  PRIMARY KEY(questionid) 
                  
        );";
        $sql.="CREATE TABLE IF NOT EXISTS answers_master(
                  userid VARCHAR(25) NOT NULL,
                  questionid VARCHAR (25) NOT NULL,
                  answerid VARCHAR (50) NOT NULL UNIQUE ,
                  createdat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
                  lastedited CURRENT_TIMESTAMP ,
                  content VARCHAR (4000) NOT NULL,
                  tagid1 VARCHAR(25) NOT NULL,
                  isreported VARCHAR (10),
                  PRIMARY (answerid)
        );";

        $conn->exec($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

?>