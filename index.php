<?php 
session_start();
if (!isset($_SESSION["Admin"])) {
    header("location:Controllers/loginController.php");
    exit;
}else{$ID= $_SESSION["Admin"];}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hệ Thống</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: #343a40;
            color: white;
            padding-top: 20px;
            z-index: 1020;
        }

        .sidebarct {
            height: 90%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-top: 56px;
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            position: fixed;
            left: 250px;
            top: 0;
            right: 0;
            background-color: black;
            height: 72px;
            z-index: 1030;
        }
        .navcontent{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .ctheader{
            margin-left: 15px;
        }
        .ctlogout a,
        .ctheader a{
            font-size: 20px;
            text-decoration: none;
            color: #fff;
        }
        .ctlogout{
            margin-right: 15px;
        }
        .ctlogout a:hover,
        .ctheader a:hover{
            opacity: 0.6;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once 'Views/header.php';
require_once 'api/ApiService.php';
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = '';
}
switch ($controller) {
    case 'sanpham': {
        require_once('Controllers/sanphamController.php');
        break;
    }
    case 'danhmuc': {
        require_once('Controllers/danhmucController.php');
        break;
    }
    case 'donhang': {
        require_once('Controllers/donhangController.php');
        break;
    }
    case 'taikhoan': {
        require_once('Controllers/taikhoanController.php');
        break;
    }
    case 'danhgia': {
        require_once('Controllers/danhgiaController.php');
        break;
    }
    case 'cuahang': {
        require_once('Controllers/cuahangController.php');
        break;
    }
    case 'slider': {
        require_once('Controllers/sliderController.php');
        break;
    }
    case 'khachhang': {
        require_once('Controllers/khachhangController.php');
        break;
    }
    case 'thongke':{
        require_once('Controllers/thongkeController.php');
        break;
    }
    default: {
        require_once('Controllers/adminController.php');
        break;
    }
}
?>