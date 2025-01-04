<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/database.php');
    include_once('../../Models/taikhoan.php');

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

    $taikhoan = new taikhoan($connect);
    if(isset($_GET['id'])){
        $taikhoan->Id_user = $_GET['id'];
        if($taikhoan->getone()){
            $acc_item = array(
                'Id_user' => $taikhoan->Id_user,
                'Fullname' => $taikhoan->Fullname,
                'Password' => $taikhoan->Password,
                'Email' => $taikhoan->Email,
            );
            print_r(json_encode($acc_item));
        }else{
            header("HTTP/1.0 404 Not Found");
            echo json_encode([
                'status' => 404,
                'message' => 'Tài khoản không tồn tại.'
            ]);
        }
    }else{
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 404,
            'message' => 'ID tài khoản không được cung cấp.'
        ]);
    }
?>