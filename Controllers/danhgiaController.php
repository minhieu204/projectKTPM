<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    case 'delete':{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $deleteData = [
                'iddanhgia' => $id
            ];
            $response_data = callApi('http://localhost/projectKTPM/api/danhgia/delete.php', 'DELETE', $deleteData);
            if (isset($response_data['status']) && $response_data['status'] == 200) {
                echo "<script>
                        alert('Xóa Đánh giá thành công');
                        window.location.href='index.php?controller=danhgia';
                    </script>";
            } else {
                echo "<script>
                        alert('Lỗi xóa Đánh giá: " . $response_data['message'] . "');
                        window.location.href='index.php?controller=danhgia';
                    </script>";
            }
        }
        break;
    }
    default: {

        $data = callApi('http://localhost/projectKTPM/api/danhgia/get.php');

        if (isset($data['data']) && count($data['data']) > 0) {
            $rates = $data['data'];
        } else {
            $rates = [];
            $message = 'Không tìm thấy đánh giá nào';
        }

        $ratesPerPage = 10;

        $totalRates = count($rates);

        $totalPages = ceil($totalRates / $ratesPerPage);

        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $start = ($currentPage - 1) * $ratesPerPage;

        $end = min($start + $ratesPerPage, $totalRates);

        $ratesOnPage = array_slice($rates, $start, $ratesPerPage);
        require_once('Views/danhgia/danhgia.php');
        break;
    }
}

?>