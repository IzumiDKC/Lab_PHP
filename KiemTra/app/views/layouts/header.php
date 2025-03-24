<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Quản lý sinh viên" ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        .container {
            padding: 20px;
        }
    </style>
<body>
    <div class="header">
        <a href="/php/KiemTra/public/">Trang chủ</a>
        <a href="/php/KiemTra/public/HocPhanController/index">Xem Học PHần</a>
        <a href="javascript:history.back()">Quay lại</a>
    </div>
    <div class="container">
    <?php include "../app/views/layouts/footer.php"; ?>
