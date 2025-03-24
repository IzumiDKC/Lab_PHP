<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
</head>
<body>
    <h1>Thêm Sinh Viên</h1>
    <form action="" method="POST">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" required><br>

        <label>Họ tên:</label>
        <input type="text" name="HoTen" required><br>

        <label>Giới tính:</label>
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>

        <label>Ngày sinh:</label>
        <input type="date" name="NgaySinh" required><br>

        <label>Hình ảnh (URL):</label>
        <input type="text" name="Hinh"><br>

        <label>Mã ngành:</label>
        <select name="MaNganh" required>
            <?php foreach ($danhSachNganh as $nganh): ?>
                <option value="<?= htmlspecialchars($nganh['MaNganh']) ?>">
                    <?= htmlspecialchars($nganh['TenNganh']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Thêm</button>
        <a href="/php/KiemTra/public/">Hủy</a>
    </form>
</body>
</html>
