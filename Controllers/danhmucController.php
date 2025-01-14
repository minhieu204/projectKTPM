<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        case 'add':{
            if(isset($_POST['add_dm'])){
                $Name = $_POST['txtName'];
                $Loai= $_POST['txtLoai'];
                $postData = [
                    'tendanhmuccon' => $Name,
                    'idloaisanpham' => $Loai
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/danhmuc/post.php', 'POST', $postData);
                if (isset($response_data['status']) && $response_data['status'] == 201) {
                    echo "<script>
                            alert('Thêm danh mục thành công');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi thêm danh mục: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                }

            }
            $LSPdata = callApi('http://localhost/projectKTPM/api/loaisanpham/get.php');
            $loaisanphams = $LSPdata['data'];
            require_once('Views/danhmuc/add_dm.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $data = callApi("http://localhost/projectKTPM/api/danhmuc/getone.php?id=$id");

                if (isset($data['status']) && $data['status'] == 404) {
                    die('Product not found');
                } else {
                    $danhmucs = $data; 
                }
                $LSPdata = callApi('http://localhost/projectKTPM/api/loaisanpham/get.php');
                $loaisanphams = $LSPdata['data'];
            }
            if(isset($_POST['edit_dm'])){
                $Name = $_POST['txtName'];
                $Loai= $_POST['txtLoai'];
                $putData = [
                    'iddanhmuccon' => $id,
                    'tendanhmuccon' => $Name,
                    'idloaisanpham' => $Loai
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/danhmuc/put.php', 'PUT', $putData);

                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Sửa danh mục thành công');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi sửa danh mục: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                }
            }
            require_once('Views/danhmuc/edit_dm.php');
            break;
        }
        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $deleteData = [
                    'iddanhmuccon' => $id
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/danhmuc/delete.php', 'DELETE', $deleteData);
                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Xóa danh mục thành công');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi xóa danh mục: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                }
            }
            break;
        }
        default:{
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $data = callApi("http://localhost/projectKTPM/api/danhmuc/search.php?search=$search");

                if (isset($data['data']) && count($data['data']) > 0) {
                    $datasearch = $data['data'];
                    require_once('Views/danhmuc/search_dm.php');
                    break;
                } else {
                    echo "<script>
                            alert('Không tìm thấy danh mục nào');
                            window.location.href='index.php?controller=danhmuc';
                        </script>";
                }
            }else{

                $data = callApi('http://localhost/projectKTPM/api/danhmuc/get.php');

                if (isset($data['data']) && count($data['data']) > 0) {
                    $danhmucs = $data['data'];
                } else {
                    $danhmucs = [];
                    $message = 'Không tìm thấy danh mục nào';
                }
                require_once('Views/danhmuc/list_dm.php');
                break;
            }
        }
    }

?>