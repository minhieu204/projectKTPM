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
        <h1 class="mb-4">Danh Sách Cửa Hàng</h1>
        <a href="index.php?controller=cuahang&action=add"><button class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm cửa hàng</button></a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên cửa hàng</th>
                    <th>địa chỉ</th>
                    <th>thành phố</th>
                    <th>hình ảnh</th>
                    <th>sđt</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 1;
                    if($products!=0){
                    foreach($products as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['ten']; ?></td>
                    <td><?php echo $value['dia_chi']; ?></td>
                    <td><?php echo $value['thanh_pho']; ?></td>
                    <td><img width=160px src="Views/img/<?php echo $value['hinhanh']?>" alt=""></td>
                    <td><?php echo $value['sdt']; ?></td>
                    <td>
                        <a href="index.php?controller=cuahang&action=edit&id=<?php echo $value['idcuahang']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button></a>   
                    </td>
                    <td>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm không?');" href="index.php?controller=cuahang&action=delete&id=<?php echo $value['idcuahang']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button></a>
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