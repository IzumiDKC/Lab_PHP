<?php
require_once "NhanVien.php";

class NhanVienSanXuat extends NhanVien {
    private $soSanPham;
    private $tangCa;

    public function __construct($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong, $soSanPham, $tangCa) {
        parent::__construct($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong);
        $this->soSanPham = $soSanPham;
        $this->tangCa = $tangCa;
    }

    public function tinhLuong() {
        $luong = parent::tinhLuong();
        $thuong = $this->soSanPham * 5000;
        $tangCa = $this->tangCa ? 500000 : 0;
        return $luong + $thuong + $tangCa;
    }
}
?>
