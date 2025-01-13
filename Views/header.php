
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hệ Thống</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: #343a40;
            color: white;
            padding-top: 20px;
            z-index: 1020;
        }

        .sidebarct {
            height: 90%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-top: 56px;
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            position: fixed;
            left: 250px;
            top: 0;
            right: 0;
            background-color: black;
            height: 72px;
            z-index: 1030;
        }
        .navcontent{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .ctheader{
            margin-left: 15px;
        }
        .ctlogout a,
        .ctheader a{
            font-size: 20px;
            text-decoration: none;
            color: #fff;
        }
        .ctlogout{
            margin-right: 15px;
        }
        .ctlogout a:hover,
        .ctheader a:hover{
            opacity: 0.6;
        }
        .search-input {
            width: 400px; /* Đặt chiều rộng cố định lớn hơn */
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebarhd"><h4 class="text-center"><img width=160px src="Views/img/logo.png" alt=""></h4></div>
        <div class="sidebarct">
            <a href="index.php?controller=taikhoan"><i class="fas fa-user"></i> Quản Lý Tài Khoản</a>
            <a href="index.php?controller=sanpham"><i class="fas fa-box"></i> Quản Lý Sản Phẩm</a>
            <a href="index.php?controller=donhang"><i class="fas fa-shopping-cart"></i> Quản Lý Đơn Hàng</a>
            <a href="index.php?controller=danhmuc"><i class="fas fa-list"></i> Quản Lý Danh Mục</a>
            <a href="index.php?controller=khachhang"><i class="fas fa-users"></i> Quản Lý Khách Hàng</a>
            <a href="index.php?controller=slider"><i class="fas fa-images"></i> Quản Lý Slider</a>
            <a href="index.php?controller=danhgia"><i class="fas fa-star"></i> Quản Lý Đánh Giá</a>
            <a href="index.php?controller=cuahang"><i class="fas fa-store"></i> Quản Lý Cửa Hàng</a>
            <a href="index.php?controller=thongke"><i class="fas fa-chart-bar"></i> Quản Lý Thống Kê</a>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar ">
        <div class="navcontent">
            <div class="ctheader">
                <a class="" href="index.php">Xin chào, <?php echo $_SESSION['fullname'] ?></a>
            </div>
            <?php if (isset($_GET['controller']) && in_array($_GET['controller'], ['sanpham', 'danhmuc', 'khachhang', 'donhang', 'taikhoan', 'cuahang', 'danhgia']) && !isset($_GET['action'])): ?>
            <div class="search-bar">
                <form method="GET" class="d-flex align-items-center">
                    <input type="hidden" name="controller" value="<?php echo htmlspecialchars($_GET['controller']); ?>">
                    <input class="form-control me-2 search-input" type="search" name="search" placeholder="Tìm kiếm..." aria-label="Search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                </form>
            </div>
            <?php endif; ?>
            <div class="ctlogout">
                <a class="" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?');" href="Controllers/logout.php">Đăng xuất</a>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>