<?php
require_once "../app/models/User.php";

class AuthController {
    private $userModel;

    public function __construct() {
        session_start();
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $this->userModel->register($username, $password);
            header("Location: /php/KiemTra/public/AuthController/login");
            exit;
        }
        require_once "../app/views/auth/register.php";
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_POST["MaSV"];  // Lấy MSSV từ form
            
            // Gọi model kiểm tra MSSV có tồn tại không
            $sinhVien = $this->userModel->getByMaSV($maSV);
    
            if ($sinhVien) {
                $_SESSION["MaSV"] = $sinhVien["MaSV"]; // Lưu session
                $_SESSION["user"] = $sinhVien["HoTen"]; // Lưu tên SV để hiển thị
                
                header("Location: /php/KiemTra/public/"); // Chuyển hướng về trang chính
                exit;
            } else {
                echo "Mã số sinh viên không tồn tại!";
            }
        }
        require_once "../app/views/auth/login.php";
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /php/KiemTra/public/");
        exit;
    }
}
?>
