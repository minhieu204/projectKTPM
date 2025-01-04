<?php
class Taikhoan{
    private $conn;
    public $Id_user;
    public $Fullname;
    public $Password;
    public $Email;
    public $Permission;
    public $forgotToken;

    public function __construct($db){
        $this->conn = $db;
    }

    public function get() {
        $sql="SELECT * FROM user";
         $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
    }
}
?>