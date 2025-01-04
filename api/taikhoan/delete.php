<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/taikhoan.php');

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

    $taikhoan = new taikhoan($connect);
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->Id_user)) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Thiếu ID tài khoản cần xóa.'
        ]);
        exit();
    }

    $taikhoan->Id_user = $data->Id_user;

    if (!$taikhoan->check()) {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'Tài khoản không tồn tại.'
        ]);
        exit();
    }

    if($taikhoan->delete()){
        echo json_encode([
        'status' => 200,
        'message' => 'Xóa Tài khoản thành công.'
        ]);
    }else{
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Xóa Tài khoản không thành công.'
        ]);
    }
?>