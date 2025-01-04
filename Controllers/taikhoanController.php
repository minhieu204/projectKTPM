<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        case 'add': {
            if (isset($_POST['addacc'])) {
                $Name = $_POST['txtName'];
                $Email = $_POST['txtEmail'];
                $Pass = md5($_POST['txtPass1']);
                $Perm = $_POST['txtPer'];
                $checkEmailData = [
                    'Email' => $Email
                ];
                $emailCheckResponse = callApi('http://localhost/projectKTPM/api/taikhoan/checkemail.php', 'POST', $checkEmailData);
    
                if (isset($emailCheckResponse['status']) && $emailCheckResponse['message'] == 'Email đã tồn tại.') {
                    $errorMessage = "Email đã tồn tại trong hệ thống!";
                } else {
                    $postData = [
                        'Fullname' => $Name,
                        'Email' => $Email,
                        'Password' => $Pass,
                        'Permission' => $Perm,
                    ];
    
                    $response_data = callApi('http://localhost/projectKTPM/api/taikhoan/post.php', 'POST', $postData);
                    
                    if (isset($response_data['status']) && $response_data['status'] == 201) {
                        echo "<script>
                                alert('Thêm Tài khoản thành công');
                                window.location.href='index.php?controller=taikhoan';
                            </script>";
                    } else {
                        echo "<script>
                                alert('Lỗi thêm Tài khoản: " . $response_data['message'] . "');
                                window.location.href='index.php?controller=taikhoan';
                            </script>";
                    }
                }
            }
            require_once('Views/taikhoan/add_acc.php');
            break;
        }
        default:{

            $data = callApi('http://localhost/projectKTPM/api/taikhoan/get.php');

            if (isset($data['data']) && count($data['data']) > 0) {
                $accs = $data['data'];
            } else {
                $accs = [];
                $message = 'Không tìm thấy tài khoản nào';
            }
             
             $accsPerPage = 10;

             $totalAccs = count($accs);
 
             $totalPages = ceil($totalAccs / $accsPerPage);
 
             $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
 
             $start = ($currentPage - 1) * $accsPerPage;

             $end = min($start + $accsPerPage, $totalAccs);
 
             $accsOnPage = array_slice($accs, $start, $accsPerPage);
            require_once('Views/taikhoan/taikhoan.php');
            break;
        }
    }

?>
