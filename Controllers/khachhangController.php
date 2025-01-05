<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    case 'delete': {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $deleteData = [
                'Id_user' => $id
            ];
            $deleteData2 = [
                'id' => $id
            ];
            $response_data = callApi('http://localhost/projectKTPM/api/taikhoan/delete.php', 'DELETE', $deleteData);
            if ((isset($response_data['status']) && $response_data['status'] == 200)) {
                $response_data2 = callApi('http://localhost/projectKTPM/api/khachhang/delete.php', 'DELETE', $deleteData2);
                if ((isset($response_data['status']) && $response_data['status'] == 200)) {
                $_SESSION['susMessage'] = "Khách hàng đã được xóa thành công!!!";
                header("Location: index.php?controller=khachhang");
                exit();
            } else{
                 $_SESSION['eMessage'] = "Lỗi xóa Khách hàng: ". $response_data2['message'] ."";
                header("Location: index.php?controller=khachhang");
                exit();
            }
            } else {
                $_SESSION['eMessage'] = "Lỗi xóa Tài khoản: ". $response_data['message'] ."";
                header("Location: index.php?controller=khachhang");
                exit();
            }
        }
        break;
    }
    default: {
        $data = callApi('http://localhost/projectKTPM/api/khachhang/get.php');

        if (isset($data['data']) && count($data['data']) > 0) {
            $rates = $data['data'];
        } else {
            $rates = [];
            $message = 'Không tìm thấy khách hàng nào';
        }

        $ratesPerPage = 10;

        $totalRates = count($rates);

        $totalPages = ceil($totalRates / $ratesPerPage);

        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $start = ($currentPage - 1) * $ratesPerPage;

        $end = min($start + $ratesPerPage, $totalRates);

        $ratesOnPage = array_slice($rates, $start, $ratesPerPage);
        require_once('Views/khachhang/khachhang.php');
        break;
    }
}

?>