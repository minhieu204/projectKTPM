<?php
    class login{
        private $conn;
        public $Email;
        public $Password;

        public function __construct($db){
            $this->conn = $db;
        }

        public function login() {
            $query = "SELECT * FROM user WHERE Email = :email and Permission = 'Admin' and Password = :password";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $this->Email);
            $stmt->bindParam(':password', $this->Password);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $user;
            }
    
            return false;
        }
    }
?>