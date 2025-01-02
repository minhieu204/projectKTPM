<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/sanpham.php');

    if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
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
    
    $sanpham->idsanpham = $data->idsanpham;

    if (!$sanpham->exists()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'Sản phẩm không tồn tại.'
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
    if ($sanpham->put()) {
        echo json_encode([
            'status' => 200,
            'message' => 'Cập nhật sản phẩm thành công.'
        ]);
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Không thể cập nhật sản phẩm.'
        ]);
    }
?>