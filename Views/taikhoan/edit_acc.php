<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tài khoản</title>
</head>

<body>
    <div class="content">
        <h1 class="mb-4">Sửa Tài khoản</h1>
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="Name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="Name" placeholder="Nhập họ và tên" name="txtName" 
                       value="<?php echo $taikhoan['Fullname'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="txtEmail"
                       value="<?php echo $taikhoan['Email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password1" placeholder="Nhập Mật khẩu" name="txtPass" value="<?php echo $taikhoan['Password'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editacc"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
</body>

</html>
