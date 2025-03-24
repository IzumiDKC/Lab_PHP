<?php
class NhanVien {
    protected $hoTen;
    protected $ngaySinh;
    protected $gioiTinh;
    protected $soCon;
    protected $ngayVaoLam;
    protected $heSoLuong;

    public function __construct($hoTen, $ngaySinh, $gioiTinh, $soCon, $ngayVaoLam, $heSoLuong) {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->gioiTinh = $gioiTinh;
        $this->soCon = $soCon;
        $this->ngayVaoLam = $ngayVaoLam;
        $this->heSoLuong = $heSoLuong;
    }

    public function tinhLuong() {
        return $this->heSoLuong * 1490000;
    }
}
?>
