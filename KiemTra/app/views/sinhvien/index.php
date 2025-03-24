
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
<?php $title = "Danh sách sinh viên"; include "../app/views/layouts/header.php"; ?>
<?php if (isset($_SESSION["user"])): ?>
        <p>Xin chào, <b><?= htmlspecialchars($_SESSION["user"]); ?></b>! <a href="/php/KiemTra/public/AuthController/logout">Đăng xuất</a></p>
    <?php else: ?>
        <a href="/php/KiemTra/public/AuthController/login">Đăng Nhập</a> |
        <a href="/php/KiemTra/public/AuthController/register">Đăng Ký</a>
    <?php endif; ?>

    <h1>Danh sách sinh viên</h1>
    <a href="/php/KiemTra/public/SinhVienController/create">Thêm sinh viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Hình</th>
            <th>Ngành học</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($sinhViens as $sv): ?>
        <tr>
            <td><?= $sv['MaSV']; ?></td>
            <td><?= $sv['HoTen']; ?></td>
            <td><?= $sv['GioiTinh']; ?></td>
            <td><?= $sv['NgaySinh']; ?></td>
            <td><img src="<?= $sv['Hinh']; ?>" width="50"></td>
            <td><?= $sv['MaNganh']; ?></td>
            <td>
                <a href="/php/KiemTra/public/SinhVienController/detail/<?= $sv['MaSV']; ?>">Chi tiết</a> |
                <a href="/php/KiemTra/public/SinhVienController/edit/<?= $sv['MaSV']; ?>">Sửa</a> |
                <a href="/php/KiemTra/public/SinhVienController/delete/<?= $sv['MaSV']; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
