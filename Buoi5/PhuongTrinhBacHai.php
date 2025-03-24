<?php
require_once "PhuongTrinhBacNhat.php";

class PhuongTrinhBacHai extends PhuongTrinhBacNhat {
    private $c;

    public function __construct($a, $b, $c) {
        parent::__construct($a, $b);
        $this->c = $c;
    }

    public function giai() {
        if ($this->a == 0) {
            $ptBacNhat = new PhuongTrinhBacNhat($this->b, $this->c);
            return $ptBacNhat->giai();
        }

        $delta = $this->b * $this->b - 4 * $this->a * $this->c;
        if ($delta < 0) {
            return "PT vô nghiệm";
        } elseif ($delta == 0) {
            return "PT có nghiệm kép: x = " . (-$this->b / (2 * $this->a));
        } else {
            $x1 = (-$this->b + sqrt($delta)) / (2 * $this->a);
            $x2 = (-$this->b - sqrt($delta)) / (2 * $this->a);
            return "Nghiệm: x1 = $x1, x2 = $x2";
        }
    }
}
?>
