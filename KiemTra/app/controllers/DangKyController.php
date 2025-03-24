<?php
require_once "../app/models/DangKy.php";

class DangKyController {
    private $dangKyModel;

    public function __construct() {
        session_start();
        $this->dangKyModel = new DangKy();
    }

    // Hiển thị danh sách học phần đã đăng ký
    public function index() {
        if (!isset($_SESSION["MaSV"])) {
            header("Location: /php/Buoi6/public/AuthController/login");
            exit;
        }
        $maSV = $_SESSION["MaSV"];
        $maDK = $this->dangKyModel->getCurrentMaDK($maSV);

        if (!$maDK) {
            $maDK = $this->dangKyModel->createDangKy($maSV);
        }

        $hocPhans = $this->dangKyModel->getChiTietDangKy($maDK);
        require_once "../app/views/dangky/index.php";
    }

    // Xử lý thêm học phần
    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_SESSION["MaSV"];
            $maDK = $this->dangKyModel->getCurrentMaDK($maSV);
            $maHP = $_POST["MaHP"];
            $this->dangKyModel->addHocPhan($maDK, $maHP);
            header("Location: /php/Buoi6/public/DangKyController/index");
            exit;
        }
    }

    // Xóa một học phần
    public function remove() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_SESSION["MaSV"];
            $maDK = $this->dangKyModel->getCurrentMaDK($maSV);
            $maHP = $_POST["MaHP"];
            $this->dangKyModel->removeHocPhan($maDK, $maHP);
            header("Location: /php/Buoi6/public/DangKyController/index");
            exit;
        }
    }

    // Xóa toàn bộ học phần
    public function clear() {
        $maSV = $_SESSION["MaSV"];
        $maDK = $this->dangKyModel->getCurrentMaDK($maSV);
        $this->dangKyModel->clearAllHocPhan($maDK);
        header("Location: /php/Buoi6/public/DangKyController/index");
        exit;
    }
}
?>
