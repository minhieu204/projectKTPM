<?php
class Danhgia
{
    private $conn;
    public $iddanhgia;
    public $iduser;
    public $Email;


    public $idsanpham;
    public $sao;
    public $noidung;
    public $Fullname;
    public $tensanpham;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function get()
    {
        $sql = "
            SELECT 
                danhgia.idanhgia AS iddanhgia, 
                danhgia.iduser AS iduser, 
                danhgia.idsanpham AS idsanpham, 
                danhgia.sao AS sao, 
                danhgia.noidung AS noidung,
                user.Fullname AS Fullname,
                user.Email AS Email,
                tbl_sanpham.tensanpham AS tensanpham
            FROM 
                danhgia
            JOIN 
                user ON danhgia.iduser = user.Id_user
            JOIN 
                tbl_sanpham ON danhgia.idsanpham = tbl_sanpham.idsanpham
            ORDER BY 
                danhgia.sao ASC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        return $stmt;
    }
    public function delete(){
        $sql = "DELETE FROM danhgia WHERE idanhgia=:idanhgia";
        $stmt = $this->conn->prepare($sql);
        $this->iddanhgia = htmlspecialchars(strip_tags($this->iddanhgia));

        $stmt->bindParam(':idanhgia',$this->iddanhgia);
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
        return false;
    }
    public function check() {
        $sql = "SELECT COUNT(*) as count FROM danhgia WHERE idanhgia=:idanhgia";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idanhgia', $this->iddanhgia);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'] > 0;
    }
    
}

?>