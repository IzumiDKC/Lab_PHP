<?php
require_once "app/controllers/NhanVienController.php";

$controller = new NhanVienController();

if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
    $action = $_GET['action'];
    $controller->$action();
} else {
    $controller->index(); // Mặc định hiển thị trang nhập liệu
}
