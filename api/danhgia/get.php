<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once('../../config/database.php');
include_once('../../Models/danhgia.php');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
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
$get = $danhgia->get();

$num = $get->rowCount();
if($num > 0){
    $acc_array = [];
    $acc_array['data'] = [];
    while($row = $get->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $acc_item = array(
            'iddanhgia' => $iddanhgia,
            'iduser' => $iduser,
            'Fullname' => $Fullname,
            'Email' => $Email,
            'idsanpham' => $idsanpham,
            'tensanpham' => $tensanpham,
            'sao' => $sao,
            'noidung' => $noidung,
        );
        array_push($acc_array['data'], $acc_item);
    }
    echo json_encode($acc_array);
}else{
    header("HTTP/1.0 404 Not Found");
    echo json_encode([
        'status' => 404,
        'message' => 'Không tìm thấy đánh giá nào'
    ]);
}
?>