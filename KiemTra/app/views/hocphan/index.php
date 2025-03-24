<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách học phần</title>
</head>
<body>
    <h1>Danh sách học phần</h1>
    <table border="1">
        <tr>
            <th>Mã HP</th>
            <th>Tên học phần</th>
            <th>Số tín chỉ</th>
            <th>Đăng ký</th>
        </tr>
        <?php foreach ($hocPhans as $hp): ?>
        <tr>
            <td><?= htmlspecialchars($hp['MaHP']); ?></td>
            <td><?= htmlspecialchars($hp['TenHP']); ?></td>
            <td><?= htmlspecialchars($hp['SoTinChi']); ?></td>
            <td>
                <a href="/php/KiemTra/public/DangKyController/dangky/<?= $hp['MaHP']; ?>">Đăng ký</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="/php/KiemTra/public/">Quay lại</a>
</body>
</html>
