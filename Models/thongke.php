<?php
    class thongke{
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function get(){
            $sql = "SELECT YEAR(tbl_donhang.ngaydat) AS nam, 
                MONTH(tbl_donhang.ngaydat) AS thang,
                SUM(tbl_sanpham.giasanpham * tbl_chitietdonhang.soluongCT) AS doanhthu_thang,
                COUNT(DISTINCT tbl_donhang.iddonhang) AS sodon_thang,
                SUM(tbl_chitietdonhang.soluongCT) AS sohang_thang
                FROM tbl_donhang
                JOIN tbl_chitietdonhang ON tbl_donhang.iddonhang = tbl_chitietdonhang.madon
                JOIN tbl_sanpham ON tbl_chitietdonhang.idsanpham = tbl_sanpham.idsanpham
                WHERE tbl_donhang.tinhtrang = 0
                GROUP BY YEAR(tbl_donhang.ngaydat), MONTH(tbl_donhang.ngaydat)
                ORDER BY YEAR(tbl_donhang.ngaydat) DESC, MONTH(tbl_donhang.ngaydat) DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(); 
            return $stmt;
        }
    }
?>