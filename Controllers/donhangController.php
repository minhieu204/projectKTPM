<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $deleteData = [
                    'iddonhang' => $id
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/donhang/delete.php', 'DELETE', $deleteData);
                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Xóa đơn hàng thành công');
                            window.location.href='index.php?controller=donhang';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi xóa đơn hàng: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=donhang';
                        </script>";
                }
            }
            break;
        }
        case 'see':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $data = callApi("http://localhost/projectKTPM/api/donhang/getctdh.php?id=$id");

                if (isset($data['data']) && count($data['data']) > 0) {
                    $chitietdonhangs = $data['data'];
                } else {
                    $chitietdonhangs = [];
                    $message = 'Không tìm thấy đơn hàng nào';
                }
            }

            
            require_once('Views/donhang/list_ctdh.php');
            break;
        }
        default:{

            $data = callApi('http://localhost/projectKTPM/api/donhang/get.php');

            if (isset($data['data']) && count($data['data']) > 0) {
                $donhangs = $data['data'];
            } else {
                $donhangs = [];
                $message = 'Không tìm thấy đơn hàng nào';
            }
            require_once('Views/donhang/list_dh.php');
            break;
        }
    }

?>