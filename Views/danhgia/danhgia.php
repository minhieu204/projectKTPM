<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài khoản</title>
</head>
<body>
    <!-- Content -->
    <div class="content">
        <h1 class="mb-4">Quản Lý Đánh giá của Khách hàng</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Sản phẩm</th>
                    <th>Số sao</th>
                    <th>Nội dung</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    if($ratesOnPage!=0){
                    foreach($ratesOnPage as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['Fullname']; ?></td>
                    <td><?php echo $value['Email']; ?></td>
                    <td><?php echo $value['tensanpham']; ?></td>
                    <td><?php echo $value['sao']; ?></td>
                    <td><?php echo $value['noidung']; ?></td>
                    <td>
                    <a onclick="return confirm('Bạn có muốn xóa đánh giá của <?php echo $value['Fullname']; ?> không?');" href="index.php?controller=danhgia&action=delete&id=<?php echo $value['iddanhgia']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button></a>
                    </td>
                </tr>
                <?php
                    $stt++;
                    }
                }
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=danhgia&page=<?php echo $currentPage - 1; ?>">&laquo;</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i === $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="index.php?controller=danhgia&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=danhgia&page=<?php echo $currentPage + 1; ?>">&raquo;</a>
            </li>
        <?php endif; ?>
    </ul>
    </nav>
    </div>
    
</body>
</html>