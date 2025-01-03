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
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tongtien=0;
                    $stt=1;
                    if($chitietdonhangs!=0){
                    foreach($chitietdonhangs as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['madon']; ?></td>
                    <td><?php echo $value['tensanpham']; ?></td>
                    <td><?php echo $value['soluongCT']; ?></td>
                    <td><?php echo $value['giasanpham']; ?></td>
                    <td><?php echo $value['soluongCT']*$value['giasanpham']; ?></td>
                </tr>
                <?php
                    $tongtien+=$value['soluongCT']*$value['giasanpham'];
                    $stt++;
                    }
                }
                ?>
                <tr>
                    <td colspan="6" style="text-align: center; font-weight: bold; font-size: 24px;">Tổng tiền: <?php echo number_format($tongtien,0,',',','); ?> vnđ</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>