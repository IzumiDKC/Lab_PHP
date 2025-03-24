<?php
require_once __DIR__ . "/../../config/database.php";

class HocPhan {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM HocPhan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
