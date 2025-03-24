<?php session_start(); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php 
    $title = "Danh sách sinh viên"; 
    include "../app/views/layouts/header.php"; 
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary">Danh sách sinh viên</h1>
        <a href="/php/KiemTra/public/SinhVienController/create" class="btn btn-success">+ Thêm sinh viên</a>
    </div>

    <div class="mb-3">
        <?php if (isset($_SESSION["user"])): ?>
            <p class="alert alert-info">Xin chào, <b><?= htmlspecialchars($_SESSION["user"]); ?></b>! 
                <a href="/php/KiemTra/public/AuthController/logout" class="btn btn-danger btn-sm">Đăng xuất</a>
            </p>
        <?php else: ?>
            <a href="/php/KiemTra/public/AuthController/login" class="btn btn-primary btn-sm">Đăng Nhập</a>
            <a href="/php/KiemTra/public/AuthController/register" class="btn btn-secondary btn-sm">Đăng Ký</a>
        <?php endif; ?>
    </div>

    <table class="table table-bordered table-hover text-center">
        <thead class="table-primary">
            <tr>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Hình</th>
                <th>Ngành học</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhViens as $sv): ?>
            <tr>
                <td><?= htmlspecialchars($sv['MaSV']); ?></td>
                <td><?= htmlspecialchars($sv['HoTen']); ?></td>
                <td><?= htmlspecialchars($sv['GioiTinh']); ?></td>
                <td><?= htmlspecialchars($sv['NgaySinh']); ?></td>
                <td>
                    <img src="<?= htmlspecialchars($sv['Hinh']); ?>" width="50" class="rounded-circle">
                </td>
                <td><?= htmlspecialchars($sv['MaNganh']); ?></td>
                <td>
                    <a href="/php/KiemTra/public/SinhVienController/detail/<?= $sv['MaSV']; ?>" class="btn btn-info btn-sm">Chi tiết</a>
                    <a href="/php/KiemTra/public/SinhVienController/edit/<?= $sv['MaSV']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="/php/KiemTra/public/SinhVienController/delete/<?= $sv['MaSV']; ?>">Xóa</a>                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
