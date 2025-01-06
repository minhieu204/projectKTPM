<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tài khoản</title>
</head>

<body>
    <div class="content">
        <h1 class="mb-4">Tổng quan Tài khoản</h1>
        <?php if (isset($_SESSION['susMessage'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['susMessage']; ?>
            </div>
            <?php unset($_SESSION['susMessage']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['eMessage'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['eMessage']; ?>
            </div>
            <?php unset($_SESSION['eMessage']); ?>
        <?php endif; ?>

        <form method="POST">
        <div class="mb-3">
                <label for="Name" class="form-label">Mã tài khoản</label>
                <input type="text" class="form-control" id="Name" name="txtID" 
                       value="<?php echo $_SESSION['Admin'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="Name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="Name" placeholder="Nhập họ và tên" name="txtName" 
                       value="<?php echo $_SESSION['fullname'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="txtEmail"
                       value="<?php echo $_SESSION['email'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editacc2"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
            <button type="button" class="btn btn-link"><a href="index.php?action=resetpass">Đổi mật khẩu</a></button>
        </form>
</body>

</html>
