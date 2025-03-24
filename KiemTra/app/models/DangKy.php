<?php
require_once __DIR__ . "/../../config/database.php";

class DangKy {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function createDangKy($maSV) {
        $stmt = $this->db->prepare("INSERT INTO dangky (NgayDK, MaSV) VALUES (NOW(), ?)");
        $stmt->execute([$maSV]);
        return $this->db->lastInsertId(); 
    }

    public function getCurrentMaDK($maSV) {
        $stmt = $this->db->prepare("SELECT MaDK FROM dangky WHERE MaSV = ? ORDER BY NgayDK DESC LIMIT 1");
        $stmt->execute([$maSV]);
        return $stmt->fetchColumn();
    }

    public function getChiTietDangKy($maSV) {
        $sql = "SELECT c.MaHP, h.TenHP, h.SoTinChi
                FROM chitietdangky c
                JOIN hocphan h ON c.MaHP = h.MaHP
                JOIN dangky d ON c.MaDK = d.MaDK
                WHERE d.MaSV = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$maSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function addHocPhan($maDK, $maHP) {
        $stmt = $this->db->prepare("INSERT INTO chitietdangky (MaDK, MaHP) VALUES (?, ?)");
        return $stmt->execute([$maDK, $maHP]);
    }

    public function removeHocPhan($maDK, $maHP) {
        $stmt = $this->db->prepare("DELETE FROM chitietdangky WHERE MaDK = ? AND MaHP = ?");
        return $stmt->execute([$maDK, $maHP]);
    }

    public function clearAllHocPhan($maDK) {
        $stmt = $this->db->prepare("DELETE FROM chitietdangky WHERE MaDK = ?");
        return $stmt->execute([$maDK]);
    }
}
?>
