<?php 
session_start();
require_once '../api/ApiService.php';
    if (isset($_POST['login'])) {
        $Email = $_POST['email'];
        $Pass = md5($_POST['password']);
            $postData = [
                'Email' => $Email,
                'Password' => $Pass,
            ];
            $response_data = callApi('http://localhost/projectKTPM/api/login.php', 'POST', $postData);

            if (isset($response_data['status']) && $response_data['status'] == 201) {      
                $_SESSION['Admin'] = $response_data['Id_user'];
                $_SESSION['fullname'] = $response_data['Fullname'];
                $_SESSION['email'] = $response_data['Email'];
                $_SESSION['susMessage'] = "Đăng nhập thành công!!!!";
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['eMessage'] = "". $response_data['message'] ."";
            }
        }
    require_once('../login.php');
?>