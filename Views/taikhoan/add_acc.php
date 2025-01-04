<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tài khoản</title>
    <script>
        function checkPasswords() {
            var password1 = document.getElementById('password1').value;
            var password2 = document.getElementById('password2').value;
            var passwordError = document.getElementById('passwordError');
            
            if (password1 !== password2) {
                passwordError.innerHTML = "Mật khẩu không khớp!";
                document.getElementById('password2').style.borderColor = 'red';
                return false;
            } else {
                passwordError.innerHTML = "";
                document.getElementById('password2').style.borderColor = '';
                return true;
            }
        }

        function validateForm(event) {
            var isPasswordValid = checkPasswords();
            
            if (!isPasswordValid) {
                event.preventDefault();
            }
        }
    </script>
</head>

<body>
    <div class="content">
        <h1 class="mb-4">Thêm Tài khoản</h1>
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST" onsubmit="validateForm(event)">
            <div class="mb-3">
                <label for="Name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="Name" placeholder="Nhập họ và tên" name="txtName" 
                       value="<?php echo isset($Name) ? $Name : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="txtEmail"
                       value="<?php echo isset($Email) ? $Email : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password1" placeholder="Nhập Mật khẩu" name="txtPass1" required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Nhập lại Mật khẩu</label>
                <input type="password" class="form-control" id="password2" placeholder="Nhập lại Mật khẩu" name="txtPass2" oninput="checkPasswords()" required>
                <div id="passwordError" style="color: red;"></div>
            </div>
            <div class="mb-3">
                <label for="permission" class="form-label">Phân quyền</label>
                <select class="form-select" id="permission" name="txtPer" required>
                    <option value="Customer" <?php echo isset($Perm) && $Perm == 'Customer' ? 'selected' : ''; ?>>Khách Hàng</option>
                    <option value="Admin" <?php echo isset($Perm) && $Perm == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="addacc"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
</body>

</html>
