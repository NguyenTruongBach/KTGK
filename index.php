<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách học phần</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .btn-dangky {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
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

    <h2>DANH SÁCH HỌC PHẦN</h2>

    <table>
        <tr>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th></th>
        </tr>
        <?php
        $stmt = $conn->query("SELECT * FROM hocphan");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['MaHP'] . "</td>";
            echo "<td>" . $row['TenHP'] . "</td>";
            echo "<td>" . $row['SoTC'] . "</td>";
            echo "<td><a href='dangky.php?id=" . $row['MaHP'] . "' class='btn-dangky'>Đăng ký</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>