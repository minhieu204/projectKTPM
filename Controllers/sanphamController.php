<?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= '';
    }
    switch($action){
        case 'add':{
            if(isset($_POST['add_sp'])){
                $Name = $_POST['txtName'];
                $Size = $_POST['txtSize'];
                $Color = $_POST['txtColor'];
                $GiaBan = $_POST['txtGiaBan'];
                $Image = $_POST['txtImage'];
                $MieuTa = $_POST['txtMieuTa'];
                $Loai= $_POST['txtLoai'];
                $LoaiCT= $_POST['txtLoaiCT'];
                $SoLuong= $_POST['txtSoLuong'];
                $postData = [
                    'tensanpham' => $Name,
                    'giasanpham' => $GiaBan,
                    'hinhanhsanpham' => $Image,
                    'color' => $Color,
                    'size' => $Size,
                    'motasanpham' => $MieuTa,
                    'idloaisanpham' => $Loai,
                    'iddanhmuccon' => $LoaiCT,
                    'soluong' => $SoLuong
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/sanpham/post.php', 'POST', $postData);
                if (isset($response_data['status']) && $response_data['status'] == 201) {
                    echo "<script>
                            alert('Thêm sản phẩm thành công');
                            window.location.href='index.php?controller=sanpham';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi thêm sản phẩm: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=sanpham';
                        </script>";
                }
            }
            $LSPdata = callApi('http://localhost/projectKTPM/api/loaisanpham/get.php');
            $loaisanphams = $LSPdata['data'];
            $CTLSPdata = callApi('http://localhost/projectKTPM/api/danhmuc/get.php');
            $danhmucs = $CTLSPdata['data'];
            require_once('Views/sanpham/add_sp.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $data = callApi("http://localhost/projectKTPM/api/sanpham/getone.php?id=$id");

                if (isset($data['status']) && $data['status'] == 404) {
                    die('Product not found');
                } else {
                    $product = $data; 
                }
                $LSPdata = callApi('http://localhost/projectKTPM/api/loaisanpham/get.php');
                $loaisanphams = $LSPdata['data'];
                $CTLSPdata = callApi('http://localhost/projectKTPM/api/danhmuc/get.php');
                $danhmucs = $CTLSPdata['data'];
            }
            if(isset($_POST['edit_sp'])){
                $Name = $_POST['txtName'];
                $Size = $_POST['txtSize'];
                $Color = $_POST['txtColor'];
                $GiaBan = $_POST['txtGiaBan'];
                $Image = $_POST['txtImage'];
                $MieuTa = $_POST['txtMieuTa'];
                $Loai= $_POST['txtLoai'];
                $LoaiCT= $_POST['txtLoaiCT'];
                $SoLuong= $_POST['txtSoLuong'];
                $putData = [
                    'idsanpham' => $id,
                    'tensanpham' => $Name,
                    'giasanpham' => $GiaBan,
                    'hinhanhsanpham' => $Image,
                    'color' => $Color,
                    'size' => $Size,
                    'motasanpham' => $MieuTa,
                    'idloaisanpham' => $Loai,
                    'iddanhmuccon' => $LoaiCT,
                    'soluong' => $SoLuong
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/sanpham/put.php', 'PUT', $putData);

                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Sửa sản phẩm thành công');
                            window.location.href='index.php?controller=sanpham';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi sửa sản phẩm: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=sanpham';
                        </script>";
                }
            }
            require_once('Views/sanpham/edit_sp.php');
            break;
        }
        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $deleteData = [
                    'idsanpham' => $id
                ];
                $response_data = callApi('http://localhost/projectKTPM/api/sanpham/delete.php', 'DELETE', $deleteData);
                if (isset($response_data['status']) && $response_data['status'] == 200) {
                    echo "<script>
                            alert('Xóa sản phẩm thành công');
                            window.location.href='index.php?controller=sanpham';
                        </script>";
                } else {
                    echo "<script>
                            alert('Lỗi xóa sản phẩm: " . $response_data['message'] . "');
                            window.location.href='index.php?controller=sanpham';
                        </script>";
                }
            }
            break;
        }
        default:{

            $data = callApi('http://localhost/projectKTPM/api/sanpham/get.php');

            if (isset($data['data']) && count($data['data']) > 0) {
                $products = $data['data'];
            } else {
                $products = [];
                $message = 'Không tìm thấy sản phẩm nào';
            }
            $productsPerPage = 5;

            $totalProducts = count($products);

            $totalPages = ceil($totalProducts / $productsPerPage);

            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            $start = ($currentPage - 1) * $productsPerPage;
            $end = min($start + $productsPerPage, $totalProducts);

            $productsOnPage = array_slice($products, $start, $productsPerPage);
            require_once('Views/sanpham/list_sp.php');
            break;
        }
    }

?>