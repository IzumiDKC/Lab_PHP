<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

<div class="card shadow p-4" style="width: 350px;">
    <h2 class="text-center text-primary">Đăng Nhập</h2>
    
    <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger"><?= $_SESSION["error"]; ?></div>
        <?php unset($_SESSION["error"]); ?>
    <?php endif; ?>
    
    <form method="POST" action="/php/KiemTra/public/AuthController/login">
        <div class="mb-3">
            <label for="MaSV" class="form-label">Mã số sinh viên</label>
            <input type="text" name="MaSV" id="MaSV" class="form-control" placeholder="Nhập mã sinh viên" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
    </form>

    <p class="text-center mt-3">
        Chưa có tài khoản? <a href="/php/KiemTra/public/AuthController/register" class="text-decoration-none">Đăng ký</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
