<?php
    class cuahang{
        private $conn;
        public $idcuahang;
        public $ten;
        public $dia_chi;
        public $thanh_pho;
        public $hinhanh;
        public $sdt;
            public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT * FROM cua_hang";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }

        public function getone(){
            $sql = "SELECT * FROM cua_hang WHERE idcuahang=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->idcuahang);
            $stmt->execute(); 
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->ten = $row['ten'];
                $this->dia_chi = $row['dia_chi'];
                $this->thanh_pho = $row['thanh_pho'];
                $this->hinhanh = $row['hinhanh'];
                $this->sdt = $row['sdt'];
                return true; 
            } else {
                return false;
            }
        }

        public function post(){
            $sql = "INSERT INTO cua_hang SET ten=:ten, dia_chi=:dia_chi, thanh_pho=:thanh_pho, hinhanh=:hinhanh, sdt=:sdt";
            $stmt = $this->conn->prepare($sql);
            $this->idcuahang = htmlspecialchars(strip_tags($this->idcuahang));
            $this->ten = htmlspecialchars(strip_tags($this->ten));
            $this->dia_chi = htmlspecialchars(strip_tags($this->dia_chi));
            $this->thanh_pho = htmlspecialchars(strip_tags($this->thanh_pho));
            $this->hinhanh = htmlspecialchars(strip_tags($this->hinhanh));
            $this->sdt = htmlspecialchars(strip_tags($this->sdt));

            $stmt->bindParam(':ten',$this->ten);
            $stmt->bindParam(':dia_chi',$this->dia_chi);
            $stmt->bindParam(':thanh_pho',$this->thanh_pho);
            $stmt->bindParam(':hinhanh',$this->hinhanh);
            $stmt->bindParam(':sdt',$this->sdt);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function put(){
            $sql = "UPDATE cua_hang SET ten=:ten, dia_chi=:dia_chi, thanh_pho=:thanh_pho, hinhanh=:hinhanh, sdt=:sdt WHERE idcuahang=:idcuahang";
            $stmt = $this->conn->prepare($sql);
            $this->idcuahang = htmlspecialchars(strip_tags($this->idcuahang));
            $this->ten = htmlspecialchars(strip_tags($this->ten));
            $this->dia_chi = htmlspecialchars(strip_tags($this->dia_chi));
            $this->thanh_pho = htmlspecialchars(strip_tags($this->thanh_pho));
            $this->hinhanh = htmlspecialchars(strip_tags($this->hinhanh));
            $this->sdt = htmlspecialchars(strip_tags($this->sdt));
            
            $stmt->bindParam(':ten',$this->ten);
            $stmt->bindParam(':dia_chi',$this->dia_chi);
            $stmt->bindParam(':thanh_pho',$this->thanh_pho);
            $stmt->bindParam(':hinhanh',$this->hinhanh);
            $stmt->bindParam(':sdt',$this->sdt);
            $stmt->bindParam(':idcuahang',$this->idcuahang);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function delete(){
            $sql = "DELETE FROM cua_hang WHERE idcuahang=:idcuahang";
            $stmt = $this->conn->prepare($sql);
            $this->idcuahang = htmlspecialchars(strip_tags($this->idcuahang));

            $stmt->bindParam(':idcuahang',$this->idcuahang);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }

        public function exists() {
            $sql = "SELECT COUNT(*) FROM cua_hang WHERE idcuahang = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->idcuahang);
            $stmt->execute();
            $row = $stmt->fetchColumn();
            
            return $row > 0;  
        }        
    }   
?>