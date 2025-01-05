<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/danhgia.php');

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

    $danhgia = new danhgia($connect);
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->iddanhgia)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Thiếu ID đánh giá cần xóa.'
        ]);
        exit();
    }

    $danhgia->iddanhgia = $data->iddanhgia;

    if (!$danhgia->check()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'Đánh giá không tồn tại.'
        ]);
        exit();
    }

    if($danhgia->delete()){
        echo json_encode([
        'status' => 200,
        'message' => 'Xóa Đánh giá thành công.'
        ]);
    }else{
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Xóa Đánh giá không thành công.'
        ]);
    }
?>