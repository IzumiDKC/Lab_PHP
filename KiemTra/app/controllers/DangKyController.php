<?php
require_once "../app/models/DangKy.php";

class DangKyController {
    private $dangKyModel;

    public function __construct() {
        session_start();
        $this->dangKyModel = new DangKy();
    }

    public function index() {
        if (!isset($_SESSION["MaSV"])) {
            header("Location: /php/KiemTra/public/AuthController/login");
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

    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_SESSION["MaSV"];
            $maDK = $this->dangKyModel->getCurrentMaDK($maSV);
            $maHP = $_POST["MaHP"];
            $this->dangKyModel->addHocPhan($maDK, $maHP);
            header("Location: /php/KiemTra/public/DangKyController/index");
            exit;
        }
    }

    public function remove() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_SESSION["MaSV"];
            $maDK = $this->dangKyModel->getCurrentMaDK($maSV);
            $maHP = $_POST["MaHP"];
            $this->dangKyModel->removeHocPhan($maDK, $maHP);
            header("Location: /php/KiemTra/public/DangKyController/index");
            exit;
        }
    }

    public function clear() {
        $maSV = $_SESSION["MaSV"];
        $maDK = $this->dangKyModel->getCurrentMaDK($maSV);
        $this->dangKyModel->clearAllHocPhan($maDK);
        header("Location: /php/KiemTra/public/DangKyController/index");
        exit;
    }
}
?>
