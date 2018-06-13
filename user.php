<?php

class User{
    private $servername= "localhost";
    private $dbname = "userdata";
    private $username = "root";
    private $password = "";
    private $usertbl = "userdetails_master";
    private $db ;
    public function _createconn(){
        try{
            $conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname,$this->username,$this->password);
            $this->db = $conn;
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getrows($conditions = array()){
        if(is_array($conditions)){

            $sql = "SELECT";
            $sql .= array_key_exists('select',$conditions)?$conditions['select']:" * ";
            $sql .="FROM ".$this->usertbl;
            $sql .= " WHERE ";

            if(array_key_exists('where',$conditions)){
                $i=0;
                foreach($conditions['where'] as $key=>$value){
                    $pre = ($i>0)?"AND":"";
                    $sql .= $pre." ".$key."='".$value."'";
                    $i++;
                }
            }
//            echo $sql;
            try{
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//                $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,FALSE);
                $result = $this->db->query($sql);
                $_SESSION['userinfo']=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC) ;


            }
            catch(PDOException $e){
                echo $e->getMessage()."err.......";
            }
            if($conditions['return_type']=='count'){
                if($result==FALSE){
                    echo "<br>creating account";
                    return FALSE;
                }else{
                    $count= 0;

                    foreach($result->fetchAll(PDO::FETCH_COLUMN,0) as $key=>$value) {
                        $count++;
                    }
//                    var_dump($result);

//                    echo $count."<br>";
                    return $count;
                }

            }
           /* if($conditions['return_type']=="row"){
                if($result==FALSE){
//                    echo "<br>creating account";
                    return FALSE;
                }else{

                    return json_encode($result);
                }

            }*/
            else{
                return false;
            }
        }
        else{
            return false;
        }

    }
    public function insert($data = array()){
        if(!empty($data)&& is_array($data)){
            $columns = "";
            $values = "";
            $i=0;
            foreach ($data as $key=>$value){
                $pre = ($i>0)?",":"";
                $columns .= $pre.$key;
                $values .= $pre."'".$value."'";
                $i++;
            }

            $sql = "INSERT INTO ".$this->usertbl."(".$columns.") VALUES(".$values.")";
            try{
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,FALSE);
                $insertdata = $this->db->query($sql);

            }catch(PDOException $e){
                echo $e->getMessage()."erroorrr";
            }
            /*try{
                $result = $this->db->query($sql);
                $_SESSION['userinfo']=$result->fetch(PDO::FETCH_ASSOC) ;
                print_r(json_encode($_SESSION['userinfo']));
            }catch(PDOException $e){
                echo $e->getMessage()."erroorrr";
            }*/
//            print_r($insertdata);
            return $insertdata?$this->db->lastInsertId():false;
        }
        else{
//            echo "insert error";
            return false;
        }
    }
}


?>

