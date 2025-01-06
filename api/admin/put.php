<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once('../../config/database.php');
include_once('../../Models/Admin.php');

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

$admin = new admin($connect);
$data = json_decode(file_get_contents("php://input"));
if (!isset($data->Fullname, $data->Email,$data->Id_user)) {
    header("HTTP/1.0 400 Bad Request");
    echo json_encode([
        'status' => 400,
        'message' => 'Dữ liệu không đầy đủ.'
    ]);
    exit();
}

$admin->Id_user = $data->Id_user;
$admin->Email = $data->Email;
$admin->Fullname = $data->Fullname;
if ($admin->put()) {
    echo json_encode([
        'status' => 200,
        'message' => 'Cập nhật tài khoản thành công.'
    ]);
} else {
    header("HTTP/1.0 500 Internal Server Error");
    echo json_encode([
        'status' => 500,
        'message' => 'Không thể cập nhật tài khoản.'
    ]);
}
?>