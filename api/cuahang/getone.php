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
    if(isset($_GET['id'])){
        $cuahang->idcuahang = $_GET['id'];
        if($cuahang->getone()){
            $sp_item = array(
                'idcuahang' => $cuahang -> idcuahang,
                'ten' => $cuahang -> ten,
                'dia_chi' => $cuahang -> dia_chi,
                'thanh_pho' => $cuahang -> thanh_pho,
                'hinhanh' => $cuahang -> hinhanh,
                'sdt' => $cuahang -> sdt,
            );
            print_r(json_encode($sp_item));
        }else{
            header("HTTP/1.0 404 Not Found");
            echo json_encode([
                'status' => 404,
                'message' => 'Cửa hàng không tồn tại.'
            ]);
        }
    }else{
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'ID Cửa hàng không được cung cấp.'
        ]);
    }
?>