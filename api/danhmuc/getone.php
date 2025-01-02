<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/database.php');
    include_once('../../Models/danhmuc.php');

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

    $danhmuc = new danhmuc($connect);
    if(isset($_GET['id'])){
        $danhmuc->iddanhmuccon = $_GET['id'];
        if($danhmuc->getone()){
            $sp_item = array(
                'iddanhmuccon' => $danhmuc->iddanhmuccon,
                'tendanhmuccon' => $danhmuc->tendanhmuccon,
                'idloaisanpham' => $danhmuc->idloaisanpham
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