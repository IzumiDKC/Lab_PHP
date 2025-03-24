<?php
$servername = "localhost"; // Hoặc IP của MySQL
$username = "root"; // Tài khoản MySQL
$password = ""; // Mật khẩu MySQL
$database = "shop_db"; // Tên database

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
