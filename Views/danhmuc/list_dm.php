<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Content -->
    <div class="content">
        <h1 class="mb-4">Quản Lý Danh Mục</h1>
        <a href="index.php?controller=danhmuc&action=add"><button class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm danh mục</button></a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục con</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    if($danhmucs!=0){
                    foreach($danhmucs as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['tendanhmuccon']; ?></td>
                    <td><?php echo $value['tenloaisanpham']; ?></td>
                    <td>
                        <a href="index.php?controller=danhmuc&action=edit&id=<?php echo $value['iddanhmuccon']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button></a>   
                    </td>
                    <td>
                    <a onclick="return confirm('Bạn có muốn xóa danh mục không?');" href="index.php?controller=danhmuc&action=delete&id=<?php echo $value['iddanhmuccon']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button></a>
                    </td>
                </tr>
                <?php
                    $stt++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>