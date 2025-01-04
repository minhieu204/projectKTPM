<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/taikhoan.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode([
            'status' => 405,
            'message' => 'Method Not Allowed'
        ]);
        exit();
    }

    $db = new database();
    $connect = $db->connect();

    if (!$connect) {
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode([
            'status' => 500,
            'message' => 'Không thể kết nối đến cơ sở dữ liệu.'
        ]);
        exit();
    }

    $taikhoan = new taikhoan($connect);

    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->Email) || empty($data->Email)) {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Email không được để trống.'
        ]);
        exit();
    }

    if (!filter_var($data->Email, FILTER_VALIDATE_EMAIL)) {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Email không hợp lệ.'
        ]);
        exit();
    }

    $taikhoan->Email = $data->Email;
    $exists = $taikhoan->checkemail();

    if ($exists) {
        http_response_code(200);
        echo json_encode([
            'status' => 200,
            'exists' => true,
            'message' => 'Email đã tồn tại.'
        ]);
    } else {
        http_response_code(200);
        echo json_encode([
            'status' => 200,
            'exists' => false,
            'message' => 'Email có thể sử dụng.'
        ]);
    }
?>
