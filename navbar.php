<nav style="background-color: #333; padding: 1em;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
        <a href="index.php" style="color: white; text-decoration: none; font-weight: bold;">QUẢN LÝ SINH VIÊN</a>
        <div>
            <a href="index.php" style="color: white; text-decoration: none; margin: 0 10px;">Trang chủ</a>
            <a href="hocphan.php" style="color: white; text-decoration: none; margin: 0 10px;">Học Phần</a>
            <?php if (isset($_SESSION['masv'])): ?>
                <a href="dangky.php" style="color: white; text-decoration: none; margin: 0 10px;">Đăng Ký</a>
                <a href="logout.php" style="color: white; text-decoration: none; margin: 0 10px;">Đăng Xuất</a>
            <?php else: ?>
                <a href="login.php" style="color: white; text-decoration: none; margin: 0 10px;">Đăng Nhập</a>
            <?php endif; ?>
        </div>
    </div>
</nav>