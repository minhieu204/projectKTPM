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
        <h1 class="mb-4">Quản Lý Tài khoản</h1>
        <div class="btn">
            <a href="index.php?controller=taikhoan&action=add"><button class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm tài khoản</button></a>
            <a href="index.php?controller=taikhoan&action=add"><button class="btn btn-success mb-3"><i class="fas fa-edit"></i> Tài khoản của tôi</button></a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Quyền hạn</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=1;
                    if($accsOnPage!=0){
                    foreach($accsOnPage as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $value['Id_user']; ?></td>
                    <td><?php echo $value['Fullname']; ?></td>
                    <td><?php echo $value['Email']; ?></td>
                    <td><?php echo $value['Password']; ?></td>
                    <td><?php echo $value['Permission']; ?></td>
                    <td>
                        <?php
                        if ($value['Permission'] === 'Admin'){?>

                        <?php } else{ ?>
                        
                        <a href="index.php?controller=taikhoan&action=edit&id=<?php echo $value['Id_user']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button></a>
                        <?php }?>   
                    </td>
                    <td>
                    <?php
                        if ($value['Permission'] === 'Admin'){?>

                        <?php } else{ ?>
                    <a onclick="return confirm('Bạn có muốn xóa tài khoản của <?php echo $value['Fullname']; ?> không?');" href="index.php?controller=taikhoan&action=delete&id=<?php echo $value['Id_user']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button></a>
                        <?php }?>
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
                <a class="page-link" href="index.php?controller=taikhoan&page=<?php echo $currentPage - 1; ?>">&laquo;</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i === $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="index.php?controller=taikhoan&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=taikhoan&page=<?php echo $currentPage + 1; ?>">&raquo;</a>
            </li>
        <?php endif; ?>
    </ul>
    </nav>
    </div>
    
</body>
</html>