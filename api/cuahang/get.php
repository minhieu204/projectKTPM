<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/database.php');
    include_once('../../Models/cuahang.php');

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

    $cuahang = new cuahang($connect);
    $get = $cuahang->get();

    $num = $get->rowCount();
    if($num > 0){
        $sp_array = [];
        $sp_array['data'] = [];
        while($row = $get->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $sp_item = array(
                'idcuahang' => $idcuahang,
                'ten' => $ten,
                'dia_chi' => $dia_chi,
                'thanh_pho' => $thanh_pho,
                'hinhanh' => $hinhanh,
                'sdt' => $sdt,
            );
            array_push($sp_array['data'], $sp_item);
        }
        echo json_encode($sp_array);
    }else{
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'Không tìm thấy cửa hàng nào'
        ]);
    }
?>