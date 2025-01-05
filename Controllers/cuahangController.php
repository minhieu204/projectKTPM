<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        case 'add':{
            if(isset($_POST['add_ch'])){
                $ten = $_POST['txtName'];
                $dia_chi = $_POST['txtdiachi'];
                $thanh_pho = $_POST['txtthanhpho'];
                $hinhanh = $_POST['txtImage'];
                $sdt = $_POST['txtsdt'];
                $postData = [
                    'ten' => $ten,
                    'dia_chi' => $dia_chi,
                    'thanh_pho' => $thanh_pho,
                    'hinhanh' => $hinhanh,
                    'sdt' => $sdt,
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/cuahang/post.php', 'POST', $postData);
                if (isset($response_data['status']) && $response_data['status'] == 201) {
                    echo "<script>
                            alert('Thêm cửa hàng thành công');
                            window.location.href='index.php?controller=cuahang';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi thêm cửa hàng: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=cuahang';
                        </script>";
                }
            }
            require_once('Views/cuahang/add.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $data = callApi("http://localhost/projectKTPM/api/cuahang/getone.php?id=$id");

                if (isset($data['status']) && $data['status'] == 404) {
                    die('Product not found');
                } else {
                    $product = $data; 
                }
            }
            if(isset($_POST['edit_ch'])){
                $ten = $_POST['txtName'];
                $dia_chi = $_POST['txtdiachi'];
                $thanh_pho = $_POST['txtthanhpho'];
                $hinhanh = $_POST['txtImage'];
                $sdt = $_POST['txtsdt'];
                $putData = [
                'idcuahang' => $id,
                'ten' => $ten,
                'dia_chi' => $dia_chi,
                'thanh_pho' => $thanh_pho,
                'hinhanh' => $hinhanh,
                'sdt' => $sdt,
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/cuahang/put.php', 'PUT', $putData);

                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Sửa cửa hàng thành công');
                            window.location.href='index.php?controller=cuahang';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi sửa cửa hàng: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=cuahnang';
                        </script>";
                }
            }
            require_once('Views/cuahang/edit.php');
            break;
        }
        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $deleteData = [
                    'idcuahang' => $id
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/cuahang/delete.php', 'DELETE', $deleteData);
                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Xóa cửa hàng thành công');
                            window.location.href='index.php?controller=cuahang';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi xóa cửa hàng: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=cuahang';
                        </script>";
                }
            }
            break;
        }
        default:{

            $data = callApi('http://localhost/projectKTPM/api/cuahang/get.php');

            if (isset($data['data']) && count($data['data']) > 0) {
                $products = $data['data'];
            } else {
                $products = [];
                $message = 'Không tìm thấy sản phẩm nào';
            }
            require_once('Views/cuahang/list.php');
            break;
        }
    }

?>