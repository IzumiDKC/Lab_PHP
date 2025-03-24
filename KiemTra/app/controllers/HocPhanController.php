<?php
require_once "../app/models/HocPhan.php";

class HocPhanController {
    private $hocPhanModel;

    public function __construct() {
        $this->hocPhanModel = new HocPhan();
    }

    public function index() {
        $hocPhans = $this->hocPhanModel->getAll();
        require_once "../app/views/hocphan/index.php";
    }
}
?>
