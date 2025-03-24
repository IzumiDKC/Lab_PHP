<?php
require_once __DIR__ . '/../models/NhanVienVanPhong.php';
require_once __DIR__ . '/../models/NhanVienSanXuat.php';

class NhanVienController {
    public function index() {
        $luong = null; 
        require_once __DIR__ . '/../views/nhanvien_form.php';
    }

    public function tinhLuong() {
        $luong = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hoTen = $_POST['hoTen'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioiTinh'];
            $soCon = $_POST['soCon'];
            $ngayVaoLam = $_POST['ngayVaoLam'];
            $heSoLuong = $_POST['heSoLuong'];
            $loaiNhanVien = $_POST['loaiNhanVien'];
            $tienLuong = $_POST['tienLuong'];

            if ($loaiNhanVien == "vanphong") {
                $soNgayVang = $_POST['soNgayVang'];
                $troCap = $_POST['troCap'];
                $nhanVien = new NhanVienVanPhong($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong, $soNgayVang, $troCap, $tienLuong);
            } else {
                $soSanPham = $_POST['soSanPham'];
                $tangCa = isset($_POST['tangCa']) ? true : false;
                $nhanVien = new NhanVienSanXuat($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong, $soSanPham, $tangCa, $tienLuong);
            }

            $luong = $nhanVien->tinhLuong();
        }

        require_once __DIR__ . '/../views/nhanvien_form.php';
    }
}
