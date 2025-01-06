<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/database.php');
    include_once('../../Models/Admin.php');

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

    $admin = new Admin($connect);

    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->Password,$data->Email) || empty($data->Password)) {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode([
            'status' => 400,
            'message' => 'Không đủ dữ liệu.'
        ]);
        exit();
    }
    $admin->Email = $data->Email;
    $admin->Password = $data->Password;
    $exists = $admin->checkpass();

    if ($exists) {
        http_response_code(200);
        echo json_encode([
            'status' => 200,
            'exists' => true,
            'message' => 'Mật khẩu đúng.'
        ]);
    } else {
        http_response_code(200);
        echo json_encode([
            'status' => 200,
            'exists' => false,
            'message' => 'Mật khẩu sai.'
        ]);
    }
?>
