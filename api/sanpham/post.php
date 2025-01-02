<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/sanpham.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
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
    $data = json_decode(file_get_contents("php://input"));
    if (!isset($data->tensanpham, $data->giasanpham, $data->hinhanhsanpham, $data->color, $data->size, $data->motasanpham, $data->idloaisanpham, $data->iddanhmuccon, $data->soluong)) {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Dữ liệu không đầy đủ.'
        ]);
        exit();
    }

    $sanpham->tensanpham = $data->tensanpham;
    $sanpham->giasanpham = $data->giasanpham;
    $sanpham->hinhanhsanpham = $data->hinhanhsanpham;
    $sanpham->color = $data->color;
    $sanpham->size = $data->size;
    $sanpham->motasanpham = $data->motasanpham;
    $sanpham->idloaisanpham = $data->idloaisanpham;
    $sanpham->iddanhmuccon = $data->iddanhmuccon;
    $sanpham->soluong = $data->soluong;
    if ($sanpham->post()) {
        header("HTTP/1.0 201 Created");
        echo json_encode([
            'status' => 201,
            'message' => 'Sản phẩm đã được tạo thành công.'
        ]);
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Không thể tạo sản phẩm.'
        ]);
    }
?>