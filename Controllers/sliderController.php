<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        case 'add':{
            if(isset($_POST['add_sld'])){
                $image = $_POST['txtImage'];
                $postData = [
                    'image' => $image,
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/slider/post.php', 'POST', $postData);
                if (isset($response_data['status']) && $response_data['status'] == 201) {
                    echo "<script>
                            alert('Thêm slider thành công');
                            window.location.href='index.php?controller=slider';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi thêm slider: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=slider';
                        </script>";
                }
            }
            require_once('Views/slider/add.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $data = callApi("http://localhost/projectKTPM/api/slider/getone.php?id=$id");

                if (isset($data['status']) && $data['status'] == 404) {
                    die('Product not found');
                } else {
                    $product = $data; 
                }
            }
            if(isset($_POST['edit_sld'])){
                $image = $_POST['txtImage'];
                $putData = [
                    'id' => $id,
                    'image' => $image,
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/slider/put.php', 'PUT', $putData);

                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Sửa slider thành công');
                            window.location.href='index.php?controller=slider';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi sửa slider: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=slider';
                        </script>";
                }
            }
            require_once('Views/slider/edit.php');
            break;
        }
        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $deleteData = [
                    'id' => $id
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/slider/delete.php', 'DELETE', $deleteData);
                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Xóa slider thành công');
                            window.location.href='index.php?controller=slider';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi xóa slider: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=slider';
                        </script>";
                }
            }
            break;
        }
        default:{

            $data = callApi('http://localhost/projectKTPM/api/slider/get.php');

            if (isset($data['data']) && count($data['data']) > 0) {
                $products = $data['data'];
            } else {
                $products = [];
                $message = 'Không tìm thấy sản phẩm nào';
            }
            require_once('Views/slider/list.php');
            break;
        }
    }

?>