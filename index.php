<?php 
session_start();
if (!isset($_SESSION["Admin"])) {
    header("location:Controllers/loginController.php");
    exit;
}else{$ID= $_SESSION["Admin"];}

require_once 'Views/header.php';
require_once 'api/ApiService.php';

$validControllers = ['sanpham', 'danhmuc', 'donhang', 'taikhoan', 'danhgia', 'cuahang', 'slider', 'khachhang', 'thongke', 'admin'];
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'admin';
}

if (!in_array($controller, $validControllers)) {
    $controller = 'admin';
}

require_once "Controllers/{$controller}Controller.php";
?>
