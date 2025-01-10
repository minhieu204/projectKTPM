<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/slider.php');

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

    $slider = new slider($connect);
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->id)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Thiếu ID slider cần xóa.'
        ]);
        exit();
    }

    $slider->id = $data->id;

    if (!$slider->exists()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'slider không tồn tại.'
        ]);
        exit();
    }

    if($slider->delete()){
        echo json_encode([
        'status' => 200,
        'message' => 'Xóa slider thành công.'
        ]);
    }else{
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Xóa slider không thành công.'
        ]);
    }
?>