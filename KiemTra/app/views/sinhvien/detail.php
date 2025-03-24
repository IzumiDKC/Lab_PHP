<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sinh viên</title>
</head>
<body>
    <h1>Chi tiết sinh viên</h1>
    <p><b>Mã SV:</b> <?= htmlspecialchars($sinhVien['MaSV']); ?></p>
    <p><b>Họ tên:</b> <?= htmlspecialchars($sinhVien['HoTen']); ?></p>
    <p><b>Giới tính:</b> <?= htmlspecialchars($sinhVien['GioiTinh']); ?></p>
    <p><b>Ngày sinh:</b> <?= htmlspecialchars($sinhVien['NgaySinh']); ?></p>
    <p><b>Hình ảnh:</b> <br>
       <img src="<?= htmlspecialchars($sinhVien['Hinh']); ?>" width="150" onerror="this.onerror=null; this.src='/php/KiemTra/public/images/no-image.jpg';">
    </p>
    <p><b>Mã ngành:</b> <?= htmlspecialchars($sinhVien['MaNganh']); ?></p>
    
    <a href="/php/KiemTra/public/">Quay lại danh sách</a>
</body>
</html>
