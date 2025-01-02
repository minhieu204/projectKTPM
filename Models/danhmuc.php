<?php
    class danhmuc{
        private $conn;
        public $iddanhmuccon;
        public $tendanhmuccon;
        public $idloaisanpham;

        public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT dm.*, l.tenloaisanpham
                FROM tbl_danhmuccon dm
                JOIN tbl_loaisanpham l ON dm.idloaisanpham = l.idloaisanpham
                ORDER BY dm.iddanhmuccon DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }

        public function getone(){
            $sql = "SELECT * FROM tbl_danhmuccon WHERE iddanhmuccon=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->iddanhmuccon);
            $stmt->execute(); 
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->tendanhmuccon = $row['tendanhmuccon'];
                $this->idloaisanpham = $row['idloaisanpham'];
                return true; 
            } else {
                return false;
            }
        }

        public function post(){
            $sql = "INSERT INTO tbl_danhmuccon SET tendanhmuccon=:tendanhmuccon, idloaisanpham=:idloaisanpham";
            $stmt = $this->conn->prepare($sql);
            $this->tendanhmuccon = htmlspecialchars(strip_tags($this->tendanhmuccon));
            $this->idloaisanpham = htmlspecialchars(strip_tags($this->idloaisanpham));

            $stmt->bindParam(':tendanhmuccon',$this->tendanhmuccon);
            $stmt->bindParam(':idloaisanpham',$this->idloaisanpham);

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function put(){
            $sql = "UPDATE tbl_danhmuccon SET tendanhmuccon=:tendanhmuccon, idloaisanpham=:idloaisanpham 
                    WHERE iddanhmuccon=:iddanhmuccon";
            $stmt = $this->conn->prepare($sql);
            $this->iddanhmuccon = htmlspecialchars(strip_tags($this->iddanhmuccon));
            $this->tendanhmuccon = htmlspecialchars(strip_tags($this->tendanhmuccon));
            $this->idloaisanpham = htmlspecialchars(strip_tags($this->idloaisanpham));

            $stmt->bindParam(':tendanhmuccon',$this->tendanhmuccon);
            $stmt->bindParam(':idloaisanpham',$this->idloaisanpham);
            $stmt->bindParam(':iddanhmuccon',$this->iddanhmuccon);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function delete(){
            $sql = "DELETE FROM tbl_danhmuccon WHERE iddanhmuccon=:iddanhmuccon";
            $stmt = $this->conn->prepare($sql);
            $this->iddanhmuccon = htmlspecialchars(strip_tags($this->iddanhmuccon));

            $stmt->bindParam(':iddanhmuccon',$this->iddanhmuccon);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function exists() {
            $sql = "SELECT COUNT(*) FROM tbl_danhmuccon WHERE iddanhmuccon = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->iddanhmuccon);
            $stmt->execute();
            $row = $stmt->fetchColumn();
            
            return $row > 0;  
        }
    }
?>