<?php
    class user{
        
            private $db;
    
            function __construct($conn){
                $this ->db = $conn;
            }

            public function insertuser($username,$password){
                try {
                    $result = $this->getuserbyusername($username);
                    if($result['num'] > 0) {
                        return false;
                    } else{
                        $new_password = md5($password,$username);
                        $sql = "INSERT INTO user (username,password) VALUES (:username,:password)";
                        $stmt = $this ->db->prepare($sql);
        
                        $stmt->bindparam(':username',$username);
                        $stmt->bindparam(':password',$new_password);
                       
        
                        $stmt->execute();
                        return true;
                    }
               
                           
                } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
            }

            public function getuser($username,$password){
                try{
                    $sql = "select * from users where username= :username AND password= :password";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':oassword', $password);
                    $stmt->execute();
                    $result = $stmt->fetch();
                return $result;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }

            }

            public function getuserbyusername($username){
                try{
                    $sql = "select count(*) as num from user where username= :username";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':username', $username);
                    $stmt->execute();
                    $result = $stmt->fetch();
                return $result;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;

                }
            }
    }
?>
