<?php
    class sanpham{
        private $conn;
        public $idsanpham;
        public $tensanpham;
        public $giasanpham;
        public $hinhanhsanpham;
        public $color;
        public $size;
        public $motasanpham;
        public $idloaisanpham;
        public $iddanhmuccon;
        public $soluong;
        public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT sp.*, l.tenloaisanpham, d.tendanhmuccon 
                FROM tbl_sanpham sp
                JOIN tbl_loaisanpham l ON sp.idloaisanpham = l.idloaisanpham
                JOIN tbl_danhmuccon d ON sp.iddanhmuccon = d.iddanhmuccon
                ORDER BY sp.idsanpham DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }

        public function getone(){
            $sql = "SELECT * FROM tbl_sanpham WHERE idsanpham=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->idsanpham);
            $stmt->execute(); 
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->tensanpham = $row['tensanpham'];
                $this->giasanpham = $row['giasanpham'];
                $this->hinhanhsanpham = $row['hinhanhsanpham'];
                $this->color = $row['color'];
                $this->size = $row['size'];
                $this->motasanpham = $row['motasanpham'];
                $this->idloaisanpham = $row['idloaisanpham'];
                $this->iddanhmuccon = $row['iddanhmuccon'];
                $this->soluong = $row['soluong'];
                return true; 
            } else {
                return false;
            }
        }

        public function post(){
            $sql = "INSERT INTO tbl_sanpham SET tensanpham=:tensanpham, giasanpham=:giasanpham, hinhanhsanpham=:hinhanhsanpham,
                    color=:color, size=:size, motasanpham=:motasanpham, idloaisanpham=:idloaisanpham, iddanhmuccon=:iddanhmuccon, soluong=:soluong";
            $stmt = $this->conn->prepare($sql);
            $this->tensanpham = htmlspecialchars(strip_tags($this->tensanpham));
            $this->giasanpham = htmlspecialchars(strip_tags($this->giasanpham));
            $this->hinhanhsanpham = htmlspecialchars(strip_tags($this->hinhanhsanpham));
            $this->color = htmlspecialchars(strip_tags($this->color));
            $this->size = htmlspecialchars(strip_tags($this->size));
            $this->motasanpham = htmlspecialchars(strip_tags($this->motasanpham));
            $this->idloaisanpham = htmlspecialchars(strip_tags($this->idloaisanpham));
            $this->iddanhmuccon = htmlspecialchars(strip_tags($this->iddanhmuccon));
            $this->soluong = htmlspecialchars(strip_tags($this->soluong));

            $stmt->bindParam(':tensanpham',$this->tensanpham);
            $stmt->bindParam(':giasanpham',$this->giasanpham);
            $stmt->bindParam(':hinhanhsanpham',$this->hinhanhsanpham);
            $stmt->bindParam(':color',$this->color);
            $stmt->bindParam(':size',$this->size);
            $stmt->bindParam(':motasanpham',$this->motasanpham);
            $stmt->bindParam(':idloaisanpham',$this->idloaisanpham);
            $stmt->bindParam(':iddanhmuccon',$this->iddanhmuccon);
            $stmt->bindParam(':soluong',$this->soluong);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function put(){
            $sql = "UPDATE tbl_sanpham SET tensanpham=:tensanpham, giasanpham=:giasanpham, hinhanhsanpham=:hinhanhsanpham,
                    color=:color, size=:size, motasanpham=:motasanpham, idloaisanpham=:idloaisanpham, iddanhmuccon=:iddanhmuccon, soluong=:soluong 
                    WHERE idsanpham=:idsanpham";
            $stmt = $this->conn->prepare($sql);
            $this->idsanpham = htmlspecialchars(strip_tags($this->idsanpham));
            $this->tensanpham = htmlspecialchars(strip_tags($this->tensanpham));
            $this->giasanpham = htmlspecialchars(strip_tags($this->giasanpham));
            $this->hinhanhsanpham = htmlspecialchars(strip_tags($this->hinhanhsanpham));
            $this->color = htmlspecialchars(strip_tags($this->color));
            $this->size = htmlspecialchars(strip_tags($this->size));
            $this->motasanpham = htmlspecialchars(strip_tags($this->motasanpham));
            $this->idloaisanpham = htmlspecialchars(strip_tags($this->idloaisanpham));
            $this->iddanhmuccon = htmlspecialchars(strip_tags($this->iddanhmuccon));
            $this->soluong = htmlspecialchars(strip_tags($this->soluong));

            $stmt->bindParam(':tensanpham',$this->tensanpham);
            $stmt->bindParam(':giasanpham',$this->giasanpham);
            $stmt->bindParam(':hinhanhsanpham',$this->hinhanhsanpham);
            $stmt->bindParam(':color',$this->color);
            $stmt->bindParam(':size',$this->size);
            $stmt->bindParam(':motasanpham',$this->motasanpham);
            $stmt->bindParam(':idsanpham',$this->idsanpham);
            $stmt->bindParam(':idloaisanpham',$this->idloaisanpham);
            $stmt->bindParam(':iddanhmuccon',$this->iddanhmuccon);
            $stmt->bindParam(':soluong',$this->soluong);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function delete(){
            $sql = "DELETE FROM tbl_sanpham WHERE idsanpham=:idsanpham";
            $stmt = $this->conn->prepare($sql);
            $this->idsanpham = htmlspecialchars(strip_tags($this->idsanpham));

            $stmt->bindParam(':idsanpham',$this->idsanpham);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function exists() {
            $sql = "SELECT COUNT(*) FROM tbl_sanpham WHERE idsanpham = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->idsanpham);
            $stmt->execute();
            $row = $stmt->fetchColumn();
            
            return $row > 0;  
        }        
    }   
?>