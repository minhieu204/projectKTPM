<?php
class Admin{
    private $conn;
    public $Id_user;
    public $Fullname;
    public $Password;
    public $Email;

    public function __construct($db){
        $this->conn = $db;
    }
    public function put(){
        $sql = "UPDATE user SET Fullname=:Fullname, Email=:Email WHERE Id_user=:Id_user";
        $stmt = $this->conn->prepare($sql);
        $this->Id_user = htmlspecialchars(strip_tags($this->Id_user));
        $this->Fullname = htmlspecialchars(strip_tags($this->Fullname));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $stmt->bindParam(':Fullname',$this->Fullname);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':Id_user',$this->Id_user);

        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function checkpass() {
        $sql = "SELECT COUNT(*) as count FROM user WHERE Email = :Email and Password = :Password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':Password', $this->Password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
    public function resetpass(){
        $sql = "UPDATE user SET Password=:Password WHERE Email=:Email";
        $stmt = $this->conn->prepare($sql);
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $stmt->bindParam(':Password',$this->Password);
        $stmt->bindParam(':Email',$this->Email);
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
}
?>