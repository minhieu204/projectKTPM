<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        default:{

            $data = callApi('http://localhost/projectKTPM/api/taikhoan/get.php');

            if (isset($data['data']) && count($data['data']) > 0) {
                $accs = $data['data'];
            } else {
                $accs = [];
                $message = 'Không tìm thấy tài khoản nào';
            }
             
             $accsPerPage = 10;

             // Tổng số sản phẩm (lấy từ cơ sở dữ liệu)
             $totalAccs = count($accs);
 
             // Tính tổng số trang
             $totalPages = ceil($totalAccs / $accsPerPage);
 
             // Trang hiện tại (lấy từ URL hoặc mặc định là 1)
             $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
 
             // Xác định sản phẩm bắt đầu và kết thúc
             $start = ($currentPage - 1) * $accsPerPage;
             $end = min($start + $accsPerPage, $totalAccs);
 
             // Lấy danh sách sản phẩm hiển thị trên trang hiện tại
             $accsOnPage = array_slice($accs, $start, $accsPerPage);
            require_once('Views/taikhoan/taikhoan.php');
            break;
        }
    }

?>