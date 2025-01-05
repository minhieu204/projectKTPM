<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/donhang.php');

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

    $donhang = new donhang($connect);
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->iddonhang)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Thiếu ID đơn hàng.'
        ]);
        exit();
    }

    $donhang->iddonhang = $data->iddonhang;

    if (!$donhang->exists()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'Sản phẩm không tồn tại.'
        ]);
        exit();
    }

    if ($donhang->updatestt()) {
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