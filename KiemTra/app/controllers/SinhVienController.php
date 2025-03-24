<?php
require_once "../app/models/SinhVien.php";
require_once "../app/models/NganhHoc.php";

class SinhVienController {
    private $sinhVienModel;

    public function __construct() {
        $this->sinhVienModel = new SinhVien();
    }

    public function index() {
        $sinhViens = $this->sinhVienModel->getAll();
        require_once "../app/views/sinhvien/index.php";
    }

    public function create() {
        require_once "../app/models/NganhHoc.php"; // Gọi model NganhHoc
        $nganhHocModel = new NganhHoc();
        $danhSachNganh = $nganhHocModel->getAll();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->sinhVienModel->create($_POST["MaSV"], $_POST["HoTen"], $_POST["GioiTinh"], $_POST["NgaySinh"], $_POST["Hinh"], $_POST["MaNganh"]);
            header("Location: /php/KiemTra/public/");
            exit;
        }
    
        require_once "../app/views/sinhvien/create.php";
    }
    

    public function edit($id) {
        $sinhVien = $this->sinhVienModel->getById($id);
        if (!$sinhVien) {
            die("Sinh viên không tồn tại!");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newMaSV = $_POST["MaSV"];
            $this->sinhVienModel->update($id, $newMaSV, $_POST["HoTen"], $_POST["GioiTinh"], $_POST["NgaySinh"], $_POST["Hinh"], $_POST["MaNganh"]);
            header("Location: /php/KiemTra/public/");
            exit;
        }
        require_once "../app/views/sinhvien/edit.php";
    }
    
    

    public function delete($id) {
        $sinhVien = $this->sinhVienModel->getById($id);
        if (!$sinhVien) {
            die("Sinh viên không tồn tại!");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->sinhVienModel->delete($id);
            header("Location: /php/KiemTra/public/");
            exit;
        }
        require_once "../app/views/sinhvien/delete.php";
    }
    public function detail($id) {
        $sinhVien = $this->sinhVienModel->getById($id);
        if (!$sinhVien) {
            die("Sinh viên không tồn tại!");
        }
        require_once "../app/views/sinhvien/detail.php";
    }
    
}
?>
