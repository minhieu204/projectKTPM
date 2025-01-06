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
        <div class="ctlogout">
            <a class="" href="Controllers/logout.php">Đăng xuất</a>
        </div>
    </div>
</nav>