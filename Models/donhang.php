<?php
    class donhang{
        private $conn;
        public $iddonhang;
        public $iduser;
        public $tinhtrang;
        public $ngaydat;

        public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT dh.*, u.Fullname, k.so_dien_thoai, k.dia_chi 
                FROM tbl_donhang dh
                JOIN user u ON dh.iduser = u.Id_user
                JOIN khach_hang k ON dh.iduser = k.id
                ORDER BY dh.ngaydat DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }

        public function getone(){
            $sql = "SELECT * FROM tbl_donhang WHERE iddonhang=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->iddonhang);
            $stmt->execute(); 
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->iduser = $row['iduser'];
                $this->tinhtrang = $row['tinhtrang'];
                $this->ngaydat = $row['ngaydat'];
                return true; 
            } else {
                return false;
            }
        }

        public function delete(){
            $sql = "DELETE FROM tbl_donhang WHERE iddonhang=:iddonhang";
            $stmt = $this->conn->prepare($sql);
            $this->iddonhang = htmlspecialchars(strip_tags($this->iddonhang));

            $stmt->bindParam(':iddonhang',$this->iddonhang);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function updatestt(){
            $sql = "UPDATE tbl_donhang SET tinhtrang=0
                    WHERE iddonhang=:iddonhang";
            $stmt = $this->conn->prepare($sql);
            $this->iddanhmuccon = htmlspecialchars(strip_tags($this->iddonhang));

            $stmt->bindParam(':iddonhang',$this->iddonhang);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function exists() {
            $sql = "SELECT COUNT(*) FROM tbl_donhang WHERE iddonhang = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->iddonhang);
            $stmt->execute();
            $row = $stmt->fetchColumn();
            
            return $row > 0;  
        }
    }
?>