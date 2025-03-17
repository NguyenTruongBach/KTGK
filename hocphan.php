<?php
session_start();
require_once 'database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['masv'])) {
    header("Location: login.php");
    exit();
}

// Xử lý đăng ký học phần
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mahp'])) {
    $masv = $_SESSION['masv'];
    $mahp = $_POST['mahp'];

    // Kiểm tra xem đã đăng ký học phần này chưa
    $check = $conn->prepare("SELECT * FROM dangky WHERE masv = ? AND mahp = ?");
    $check->execute([$masv, $mahp]);

    if ($check->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO dangky (masv, mahp) VALUES (?, ?)");
        if ($stmt->execute([$masv, $mahp])) {
            $success = "Đăng ký học phần thành công!";
        } else {
            $error = "Có lỗi xảy ra khi đăng ký học phần.";
        }
    } else {
        $error = "Bạn đã đăng ký học phần này rồi!";
    }
}

// Lấy danh sách học phần
$stmt = $conn->query("SELECT * FROM hocphan");
$hocphans = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học phần</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        .btn-dangky {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-dangky:hover {
            background-color: #45a049;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>DANH SÁCH HỌC PHẦN</h2>

        <?php if (isset($success)): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hocphans as $hp): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($hp['mahp']); ?></td>
                        <td><?php echo htmlspecialchars($hp['tenhp']); ?></td>
                        <td><?php echo htmlspecialchars($hp['sotc']); ?></td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="mahp" value="<?php echo $hp['mahp']; ?>">
                                <button type="submit" class="btn-dangky">Đăng ký</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p style="margin-top: 20px;">
            <a href="dangky.php">Xem danh sách đã đăng ký</a>
        </p>
    </div>
</body>

</html>