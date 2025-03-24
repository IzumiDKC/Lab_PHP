<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form action="" method="POST">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" value="<?= isset($sinhVien['MaSV']) ? htmlspecialchars($sinhVien['MaSV']) : '' ?>"><br>

        <label>Họ tên:</label>
        <input type="text" name="HoTen" value="<?= isset($sinhVien['HoTen']) ? htmlspecialchars($sinhVien['HoTen']) : '' ?>" required><br>

        <label>Giới tính:</label>
        <select name="GioiTinh">
            <option value="Nam" <?= (isset($sinhVien['GioiTinh']) && $sinhVien['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= (isset($sinhVien['GioiTinh']) && $sinhVien['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
        </select><br>

        <label>Ngày sinh:</label>
        <input type="date" name="NgaySinh" value="<?= isset($sinhVien['NgaySinh']) ? $sinhVien['NgaySinh'] : '' ?>" required><br>

        <label>Hình ảnh (URL):</label>
        <input type="text" name="Hinh" value="<?= isset($sinhVien['Hinh']) ? htmlspecialchars($sinhVien['Hinh']) : '' ?>"><br>

        <label>Mã ngành:</label>
        <input type="text" name="MaNganh" value="<?= isset($sinhVien['MaNganh']) ? htmlspecialchars($sinhVien['MaNganh']) : '' ?>" required><br>

        <button type="submit">Cập nhật</button>
        <a href="/php/KiemTra/public/">Hủy</a>
    </form>
</body>
</html>
