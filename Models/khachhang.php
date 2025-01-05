<?php
class Khachhang
{
    private $conn;
    public $id;
    public $Email;
    public $so_dien_thoai;
    public $dia_chi;
    public $Fullname;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function get()
    {
        $sql = "
            SELECT 
                khach_hang.id AS id, 
                khach_hang.so_dien_thoai AS so_dien_thoai, 
                khach_hang.dia_chi AS dia_chi, 
                user.Fullname AS Fullname,
                user.Email AS Email
            FROM 
                khach_hang
            JOIN 
                user ON khach_hang.id = user.Id_user
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        return $stmt;
    }
    public function post(){
        $sql = "INSERT INTO khach_hang SET id=:id";
        $stmt = $this->conn->prepare($sql);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id',$this->id);
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function delete(){
        $sql = "DELETE FROM khach_hang WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id',$this->id);
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function check() {
        $sql = "SELECT COUNT(*) as count FROM khach_hang WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'] > 0;
    }
    
}

?>