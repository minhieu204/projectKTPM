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
                    <th>Hủy đơn</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    if($datasearch!=0){
                    foreach($datasearch as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['iddonhang']; ?></td>
                    <td><?php echo $value['Fullname']; ?></td>
                    <td><?php echo $value['so_dien_thoai']; ?></td>
                    <td><?php echo $value['dia_chi']; ?></td>
                    <td><?php echo $value['ngaydat']; ?></td>
                    <?php
                    if($value["tinhtrang"]==1){
                        $status="Đơn hàng mới";
                    ?>
                        <td>
                        <a style="text-decoration: none;" onclick="return confirm('Bạn có muốn cập nhật hàng không?');" href="index.php?controller=donhang&action=updatestt&id=<?php echo $value['iddonhang']; ?>"><?php echo $status ?></a>
                        </td>
                        <td>
                        <a onclick="return confirm('Bạn có muốn hủy đơn hàng không?');" href="index.php?controller=donhang&action=delete&id=<?php echo $value['iddonhang']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hủy</button></a>
                        </td>
                    <?php
                    }else{
                        $status="Đã cập nhật";
                    ?>
                        <td><?php echo $status ?></td>
                        <td>
                        <button class="btn btn-danger btn-sm" disabled><i class="fas fa-trash"></i> Hủy</button>
                        </td>
                    <?php
                    }
                    ?>
                    <td>
                        <a href="index.php?controller=donhang&action=see&id=<?php echo $value['iddonhang']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Xem đơn</button></a>   
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