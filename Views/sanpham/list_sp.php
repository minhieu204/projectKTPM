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
        <h1 class="mb-4">Quản Lý Sản Phẩm</h1>
        <a href="index.php?controller=sanpham&action=add"><button class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm sản phẩm</button></a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Loại</th>
                    <th>Chi tiết loại</th>
                    <th>Số lượng</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt = $start + 1;
                    if($productsOnPage!=0){
                    foreach($productsOnPage as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><img width=160px src="Views/img/<?php echo $value['hinhanhsanpham']?>" alt=""></td>
                    <td><?php echo $value['tensanpham']; ?></td>
                    <td><?php echo $value['giasanpham']; ?></td>
                    <td><?php echo $value['color']; ?></td>
                    <td><?php echo $value['size']; ?></td>
                    <td><?php echo $value['motasanpham']; ?></td>
                    <td><?php echo $value['tenloaisanpham']; ?></td>
                    <td><?php echo $value['tendanhmuccon']; ?></td>
                    <td><?php echo $value['soluong']; ?></td>
                    <td>
                        <a href="index.php?controller=sanpham&action=edit&id=<?php echo $value['idsanpham']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button></a>   
                    </td>
                    <td>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm không?');" href="index.php?controller=sanpham&action=delete&id=<?php echo $value['idsanpham']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button></a>
                    </td>
                </tr>
                <?php
                    $stt++;
                    }
                }
                ?>
                <!-- Thêm các dòng dữ liệu khác -->
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=sanpham&page=<?php echo $currentPage - 1; ?>">&laquo;</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i === $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="index.php?controller=sanpham&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=sanpham&page=<?php echo $currentPage + 1; ?>">&raquo;</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

</body>
</html>