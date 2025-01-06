<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tài khoản</title>
</head>
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
<body>
    <div class="content">
        <h1 class="mb-4">Đặt lại mật khẩu</h1>
        <?php if (isset($_SESSION['eMessage'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['eMessage']; ?>
            </div>
            <?php unset($_SESSION['eMessage']); ?>
        <?php endif; ?>

        <form method="POST" onsubmit="validateForm(event)">
        <div class="mb-3">
                <label for="Name" class="form-label">Mật khẩu cũ</label>
                <input type="password" class="form-control" id="Name" name="txtPass1" placeholder="Nhập Mật khẩu cũ"  required>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="password1" placeholder="Nhập Mật khẩu mới" name="password1"  required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Nhập lại Mật khẩu mới" required oninput="checkPasswords()">
                <div id="passwordError" style="color: red;"></div>
            </div>
            <button type="submit" class="btn btn-primary" name="reset"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
</body>

</html>
