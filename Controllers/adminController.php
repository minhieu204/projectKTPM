<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    default: {
        if (isset($_POST['editacc2'])) {
            $id = $_SESSION['Admin'];
            $Name = $_POST['txtName'];
            $Email1 = $_SESSION['email'];
            $Email = $_POST['txtEmail'];
            if ($Email1 == $Email) {
                $putData = [
                    'Id_user' => $id,
                    'Fullname' => $Name,
                    'Email' => $Email,
                ];

                $response_data = callApi('http://localhost/projectKTPM/api/admin/put.php', 'PUT', $putData);

                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    $_SESSION['email'] = $Email;
                    $_SESSION['fullname'] = $Name;
                    $_SESSION['susMessage'] = "Tài khoản đã được sửa thành công!!!";
                    header("Location: index.php");
                    exit();
                } else {
                    $_SESSION['eMessage'] = "Lỗi sửa tài khoản: ". $response_data['message'] ."";
                    header("Location: index.php");
                    exit();
                }
            } else {
                $checkEmailData = [
                    'Email' => $Email
                ];
                $emailCheckResponse = callApi('http://localhost/projectKTPM/api/taikhoan/checkemail.php', 'POST', $checkEmailData);

                if (isset($emailCheckResponse['status']) && $emailCheckResponse['message'] == 'Email đã tồn tại.') {
                    $_SESSION['eMessage'] = "Email đã tồn tại!!!";
                    header("Location: index.php");
                    exit();
                } else {
                    $putData = [
                        'Id_user' => $id,
                        'Fullname' => $Name,
                        'Email' => $Email,
                    ];

                    $response_data = callApi('http://localhost/projectKTPM/api/admin/put.php', 'PUT', $putData);

                    if (isset($response_data['status']) && $response_data['status'] == 201) {
                        $_SESSION['susMessage'] = "Tài khoản đã được sửa thành công!!!";
                        $_SESSION['email'] = $Email;
                        $_SESSION['fullname'] = $Name;
                        header("Location: index.php");
                        exit();
                    } else {
                        $_SESSION['eMessage'] = "Lỗi sửa tài khoản: ". $response_data['message'] ."";
                header("Location: index.php");
                exit();
                    }
                }
            }
        }
        require_once('Views/Admin/admin.php');
        break;
    }
    case 'resetpass':{
        if (isset($_POST['reset'])) {
            $Pass = md5($_POST['txtPass1']);
            $Pass1 = md5($_POST['password1']);
            $Email = $_SESSION['email'];
                $checkData = [
                    'Password' => $Pass,
                    'Email' => $Email,
                ];
                $emailCheckResponse = callApi('http://localhost/projectKTPM/api/admin/checkpass.php', 'POST', $checkData);

                if (isset($emailCheckResponse['status']) && $emailCheckResponse['message'] == 'Mật khẩu sai.') {
                    $_SESSION['eMessage'] = "Mật khẩu cũ không đúng!!!";
                    header("Location: index.php?action=resetpass");
                    exit();
                } else {
                    if ($Pass == $Pass1) {
                        $_SESSION['eMessage'] = "Mật khẩu mới không được trùng với mật khẩu cũ!!!";
                        header("Location: index.php?action=resetpass");
                        exit();
                    } else {
                    $putData = [
                        'Password' => $Pass1,
                        'Email' => $Email,
                    ];

                    $response_data = callApi('http://localhost/projectKTPM/api/admin/resetpass.php', 'PUT', $putData);

                    if (isset($response_data['status']) && $response_data['status'] == 200) {
                        $_SESSION['susMessage'] = "Mật khẩu đã được sửa thành công!!!";
                        header("Location: index.php");
                        exit();
                    } else {
                        $_SESSION['eMessage'] = "Lỗi đặt lại mật khẩu: ". $response_data['message'] ."";
                header("Location: index.php");
                exit();
                    }
                }}
            }
        }
        require_once('Views/Admin/resetpass.php');
        break;
}
?>
