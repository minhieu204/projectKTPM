<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/cuahang.php');

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

    $cuahang = new cuahang($connect);
    $data = json_decode(file_get_contents("php://input"));
    if (!isset($data->ten, $data->dia_chi, $data->thanh_pho, $data->hinhanh, $data->sdt)) {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Dữ liệu không đầy đủ.'
        ]);
        exit();
    }

    $cuahang->ten = $data->ten;
    $cuahang->dia_chi = $data->dia_chi;
    $cuahang->thanh_pho = $data->thanh_pho;
    $cuahang->hinhanh = $data->hinhanh;
    $cuahang->sdt = $data->sdt;
  
    if ($cuahang->post()) {
        header("HTTP/1.0 201 Created");
        echo json_encode([
            'status' => 201,
            'message' => 'Cửa hàng đã được tạo thành công.'
        ]);
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Không thể tạo sản phẩm.'
        ]);
    }
?>