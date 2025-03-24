<?php
class PhuongTrinhBacNhat {
    protected $a;
    protected $b;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function giai() {
        if ($this->a == 0) {
            return ($this->b == 0) ? "PT vô số nghiệm" : "PT vô nghiệm";
        }
        return "Nghiệm: x = " . (-$this->b / $this->a);
    }
}
?>
