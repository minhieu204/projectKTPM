<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/danhmuc.php');

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

    $danhmuc = new danhmuc($connect);
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->iddanhmuccon)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Thiếu ID danh mục cần xóa.'
        ]);
        exit();
    }

    $danhmuc->iddanhmuccon = $data->iddanhmuccon;

    if (!$danhmuc->exists()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'Sản phẩm không tồn tại.'
        ]);
        exit();
    }

    if($danhmuc->delete()){
        echo json_encode([
        'status' => 200,
        'message' => 'Xóa sản phẩm thành công.'
        ]);
    }else{
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Xóa sản phẩm không thành công.'
        ]);
    }
?>