<?php
    class loaisanpham{
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT * FROM tbl_loaisanpham ORDER BY idloaisanpham DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }
    }
?>