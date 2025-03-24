<?php
require_once "PhuongTrinhBacHai.php";

function testPhuongTrinh($a, $b, $c) {
    $pt = new PhuongTrinhBacHai($a, $b, $c);
    echo "Giải phương trình $a x² + $b x + $c = 0\n";
    echo "Kết quả: " . $pt->giai() . "\n\n";
}

// Test với các giá trị khác nhau
testPhuongTrinh(1, -3, 2);  // x1 = 2, x2 = 1
testPhuongTrinh(1, 2, 1);   // x = -1 (nghiệm kép)
testPhuongTrinh(1, 0, -4);  // x1 = 2, x2 = -2
testPhuongTrinh(1, 0, 4);   // Vô nghiệm
testPhuongTrinh(0, 2, -4);  // Phương trình bậc nhất: x = 2
testPhuongTrinh(0, 0, 3);  
testPhuongTrinh(0, 0, 0);   
