<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 50%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px #aaa;
            margin: auto;
            margin-top: 50px;
            text-align: left;
        }
        h2 {
            background: #3c8dbc;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"], input[type="checkbox"] {
            width: auto;
        }
        .submit-btn {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            padding: 10px;
            width: 100%;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 15px;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
        .result {
            font-size: 18px;
            font-weight: bold;
            color: #d9534f;
        }
    </style>
    <script>
        function toggleSanXuatFields() {
            var loaiNhanVien = document.querySelector('input[name="loaiNhanVien"]:checked').value;
            document.getElementById("sanXuatFields").style.display = loaiNhanVien === "sanxuat" ? "table-row" : "none";
        }
    </script>
</head>
<body onload="toggleSanXuatFields()">
    <div class="container">
        <h2>QUẢN LÝ NHÂN VIÊN</h2>
        <form action="index.php?action=tinhluong" method="post">
            <table>
                <tr>
                    <td><label>Họ và tên:</label></td>
                    <td><input type="text" name="hoTen" required></td>
                    <td><label>Số con:</label></td>
                    <td><input type="number" name="soCon" required></td>
                </tr>
                <tr>
                    <td><label>Ngày sinh:</label></td>
                    <td><input type="date" name="ngaySinh" required></td>
                    <td><label>Ngày vào làm:</label></td>
                    <td><input type="date" name="ngayVaoLam" required></td>
                </tr>
                <tr>
                    <td><label>Giới tính:</label></td>
                    <td>
                        <input type="radio" name="gioiTinh" value="Nam" checked> Nam
                        <input type="radio" name="gioiTinh" value="Nữ"> Nữ
                    </td>
                    <td><label>Hệ số lương:</label></td>
                    <td><input type="number" step="0.01" name="heSoLuong" required></td>
                </tr>
                <tr>
                    <td><label>Loại nhân viên:</label></td>
                    <td>
                        <input type="radio" name="loaiNhanVien" value="vanphong" checked onclick="toggleSanXuatFields()"> Văn phòng
                        <input type="radio" name="loaiNhanVien" value="sanxuat" onclick="toggleSanXuatFields()"> Sản Xuất
                    </td>
                    <td><label>Trợ cấp:</label></td>
                    <td><input type="number" name="troCap" required></td>
                </tr>
                <tr>
                    <td><label>Số ngày vắng:</label></td>
                    <td><input type="number" name="soNgayVang" required></td>
                    <td><label>Tăng ca:</label></td>
                    <td>
                        <input type="checkbox" name="tangCa" value="yes"> Có
                    </td>
                </tr>
                <tr id="sanXuatFields">
                    <td><label>Số sản phẩm:</label></td>
                    <td><input type="number" name="soSanPham"></td>
                </tr>
                <tr>
                    <td><label>Tiền lương:</label></td>
                    <td><input type="number" name="tienLuong" required></td>
                </tr>
            </table>
            <input type="submit" name="tinhluong" value="Tính lương" class="submit-btn">
        </form>

        <?php if (isset($luong)): ?>
            <div class="result">Lương thực lãnh: <?= number_format($luong, 0, ',', '.') ?> VNĐ</div>
        <?php endif; ?>
    </div>
</body>
</html>
