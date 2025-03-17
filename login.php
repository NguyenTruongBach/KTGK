<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masv = $_POST['masv'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM sinhvien WHERE MaSV = ? AND MatKhau = ?");
    $stmt->execute([$masv, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['masv'] = $masv;
        header("Location: index.php");
        exit();
    } else {
        $error = "Sai mã sinh viên hoặc mật khẩu";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .nav {
            background-color: #333;
            padding: 10px;
            margin-bottom: 20px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: blue;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="nav">
        <a href="index.php">Test1</a>
        <a href="sinhvien.php">Sinh Viên</a>
        <a href="hocphan.php">Học Phần</a>
        <a href="dangky.php">Đăng Ký</a>
        <a href="login.php">Đăng Nhập</a>
    </div>

    <div class="login-form">
        <h2>ĐĂNG NHẬP</h2>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

        <form method="POST">
            <div class="form-group">
                <label>MaSV:</label>
                <input type="text" name="masv" required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Đăng Nhập</button>
        </form>

        <a href="index.php" class="back-link">Back to List</a>
    </div>
</body>

</html>