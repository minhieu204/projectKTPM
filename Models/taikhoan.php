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
    public function getone(){
        $sql = "SELECT * FROM user WHERE Id_user=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->Id_user);
        $stmt->execute(); 
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->Fullname = $row['Fullname'];
            $this->Password = $row['Password'];
            $this->Email = $row['Email'];
            return true; 
        } else {
            return false;
        }
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
    public function check() {
        $sql = "SELECT COUNT(*) as count FROM user WHERE Id_user=:Id_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Id_user', $this->Id_user);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'] > 0;
    }
    public function put(){
        $sql = "UPDATE user SET Fullname=:Fullname, Password=:Password, Email=:Email WHERE Id_user=:Id_user";
        $stmt = $this->conn->prepare($sql);
        $this->Id_user = htmlspecialchars(strip_tags($this->Id_user));
        $this->Fullname = htmlspecialchars(strip_tags($this->Fullname));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $stmt->bindParam(':Fullname',$this->Fullname);
        $stmt->bindParam(':Password',$this->Password);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':Id_user',$this->Id_user);

        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function delete(){
        $sql = "DELETE FROM user WHERE Id_user=:Id_user";
        $stmt = $this->conn->prepare($sql);
        $this->Id_user = htmlspecialchars(strip_tags($this->Id_user));

        $stmt->bindParam(':Id_user',$this->Id_user);
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function search(){
        $sql = "SELECT * FROM user WHERE Id_user LIKE ? OR Fullname LIKE ? OR Email LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $searchValue = "%" . $this->Id_user . "%";
        $searchValue2 = "%" . $this->Fullname . "%";
        $searchValue3 = "%" . $this->Email . "%";
        $stmt->bindParam(1, $searchValue);
        $stmt->bindParam(2, $searchValue2);
        $stmt->bindParam(3, $searchValue3);
        $stmt->execute(); 
        return $stmt;
    }
}
?>