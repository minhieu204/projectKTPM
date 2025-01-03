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
        <h1 class="mb-4">Quản Lý Đơn Hàng</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>
                    <th>Tình trạng</th>
                    <th>Quản lý</th>
                    <th>Hủy đơn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    if($donhangs!=0){
                    foreach($donhangs as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['iddonhang']; ?></td>
                    <td><?php echo $value['Fullname']; ?></td>
                    <td><?php echo $value['so_dien_thoai']; ?></td>
                    <td><?php echo $value['dia_chi']; ?></td>
                    <td><?php echo $value['ngaydat']; ?></td>
                    <td><?php echo $value['tinhtrang']; ?></td>
                    <td>
                        <a href="index.php?controller=donhang&action=see&id=<?php echo $value['iddonhang']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Xem đơn</button></a>   
                    </td>
                    <td>
                    <a onclick="return confirm('Bạn có muốn hủy đơn hàng không?');" href="index.php?controller=donhang&action=delete&id=<?php echo $value['iddonhang']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hủy</button></a>
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