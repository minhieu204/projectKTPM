<?php
if (isset($_SESSION["Admin"])) {
    header("location:index.php?controller=admin");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('http://localhost/projectKTPM/Views/img/background.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            opacity: 0.9;
        }
        .login-container .form-control {
            border-radius: 50px;
        }
        .login-container .btn-primary {
            border-radius: 50px;
            background: linear-gradient(135deg, #4CAF50, #8BC34A);
            border: none;
            color: white;
        }
        .login-container .btn-primary:hover {
            background: linear-gradient(135deg, #8BC34A, #4CAF50);
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <?php if (isset($_SESSION['eMessage'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['eMessage']; ?>
            </div>
            <?php unset($_SESSION['eMessage']); ?>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100" name="login">Đăng nhập</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
