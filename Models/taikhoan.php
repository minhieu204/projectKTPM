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
    public function post(){
        $sql = "INSERT INTO user SET Fullname=:Fullname, Password=:Password, Email=:Email, Permission=:Permission";
        $stmt = $this->conn->prepare($sql);
        $this->Fullname = htmlspecialchars(strip_tags($this->Fullname));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Permission = htmlspecialchars(strip_tags($this->Permission));
        $stmt->bindParam(':Fullname',$this->Fullname);
        $stmt->bindParam(':Password',$this->Password);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':Permission',$this->Permission);


        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function checkemail() {
        $sql = "SELECT COUNT(*) as count FROM user WHERE Email = :Email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'] > 0;
    }
}
?>