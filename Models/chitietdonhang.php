<?php
    class chitietdonhang{
        private $conn;
        public $madon;

        public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT ct.*, s.tensanpham, s.giasanpham
                FROM tbl_chitietdonhang ct
                JOIN tbl_sanpham s ON ct.idsanpham = s.idsanpham
                WHERE ct.madon=?
                ORDER BY ct.idctdh DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->madon);
            $stmt->execute(); 
            return $stmt; 
    }
}
?>