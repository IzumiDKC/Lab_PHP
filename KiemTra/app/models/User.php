<?php
require_once __DIR__ . "/../../config/database.php";

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hashedPassword]);
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function getByMaSV($maSV) {
        $stmt = $this->db->prepare("SELECT MaSV, HoTen FROM sinhvien WHERE MaSV = ?");
        $stmt->execute([$maSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
