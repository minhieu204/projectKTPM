<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/cuahang.php');

    if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
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

    if (!isset($data->idcuahang)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Thiếu ID cửa hàng cần xóa.'
        ]);
        exit();
    }

    $cuahang->idcuahang = $data->idcuahang;

    if (!$cuahang->exists()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'cửa hàng không tồn tại.'
        ]);
        exit();
    }

    if($cuahang->delete()){
        echo json_encode([
        'status' => 200,
        'message' => 'Xóa cửa hàng thành công.'
        ]);
    }else{
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Xóa cửa hàng không thành công.'
        ]);
    }
?>