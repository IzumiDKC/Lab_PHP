<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xóa sinh viên</title>
</head>
<body>
    <h1>Xóa Sinh Viên</h1>
    <p>Bạn có chắc chắn muốn xóa sinh viên <b><?= $sinhVien['HoTen'] ?? '' ?></b>?</p>

    <form action="" method="POST">
        <button type="submit">Xóa</button>
        <a href="/php/KiemTra/public/">Hủy</a>
    </form>
</body>
</html>
