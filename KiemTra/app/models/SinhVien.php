<?php
require_once __DIR__ . "/../../config/database.php";

class SinhVien {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM SinhVien");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $stmt = $this->db->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh]);
    }

    public function update($oldMaSV, $newMaSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $stmt = $this->db->prepare("UPDATE SinhVien SET MaSV = ?, HoTen = ?, GioiTinh = ?, NgaySinh = ?, Hinh = ?, MaNganh = ? WHERE MaSV = ?");
        return $stmt->execute([$newMaSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh, $oldMaSV]);
    }
    
    

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
        return $stmt->execute([$id]);
    }
}
?>
