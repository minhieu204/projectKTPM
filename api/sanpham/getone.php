<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/database.php');
    include_once('../../Models/sanpham.php');

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode([
            'status' => 405,
            'message' => 'Method Not Allowed'
        ]);
        exit();
    }

    $db = new database;
    $connect = $db->connect();

    $sanpham = new sanpham($connect);
    if(isset($_GET['id'])){
        $sanpham->idsanpham = $_GET['id'];
        if($sanpham->getone()){
            $sp_item = array(
                'idsanpham' => $sanpham->idsanpham,
                'tensanpham' => $sanpham->tensanpham,
                'giasanpham' => $sanpham->giasanpham,
                'hinhanhsanpham' => $sanpham->hinhanhsanpham,
                'color' => $sanpham->color,
                'size' => $sanpham->size,
                'motasanpham' => $sanpham->motasanpham,
                'idloaisanpham' => $sanpham->idloaisanpham,
                'iddanhmuccon' => $sanpham->iddanhmuccon,
                'soluong' => $sanpham->soluong
            );
            print_r(json_encode($sp_item));
        }else{
            header("HTTP/1.0 404 Not Found");
            echo json_encode([
                'status' => 404,
                'message' => 'Sản phẩm không tồn tại.'
            ]);
        }
    }else{
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'ID sản phẩm không được cung cấp.'
        ]);
    }
?>