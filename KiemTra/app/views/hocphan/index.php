<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách học phần</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1 class="text-center mb-4">Danh sách học phần</h1>

    <table class="table table-bordered table-hover text-center">
        <thead class="table-primary">
            <tr>
                <th>Mã HP</th>
                <th>Tên học phần</th>
                <th>Số tín chỉ</th>
                <th>Đăng ký</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocPhans as $hp): ?>
            <tr>
                <td><?= htmlspecialchars($hp['MaHP']); ?></td>
                <td><?= htmlspecialchars($hp['TenHP']); ?></td>
                <td><?= htmlspecialchars($hp['SoTinChi']); ?></td>
                <td>
                    <a href="/php/KiemTra/public/DangKyController/dangky/<?= $hp['MaHP']; ?>" class="btn btn-success btn-sm">Đăng ký</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="/php/KiemTra/public/" class="btn btn-secondary">Quay lại</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
