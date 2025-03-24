<?php
require_once "NhanVien.php";

class NhanVienVanPhong extends NhanVien {
    private $soNgayVang;
    private $troCap;

    public function __construct($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong, $soNgayVang, $troCap) {
        parent::__construct($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong);
        $this->soNgayVang = $soNgayVang;
        $this->troCap = $troCap;
    }

    public function tinhLuong() {
        $luong = parent::tinhLuong();
        $tru = $this->soNgayVang * 100000;
        return $luong + $this->troCap - $tru;
    }
}
?>
