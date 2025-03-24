<?php
require_once "PhuongTrinhBacHai.php";

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = isset($_POST["a"]) ? floatval($_POST["a"]) : 0;
    $b = isset($_POST["b"]) ? floatval($_POST["b"]) : 0;
    $c = isset($_POST["c"]) ? floatval($_POST["c"]) : 0;

    $pt = new PhuongTrinhBacHai($a, $b, $c);
    $result = $pt->giai();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giải phương trình bậc hai</title>
</head>
<body>
    <h2>Nhập hệ số phương trình bậc hai ax² + bx + c = 0</h2>
    <form method="post">
        Hệ số A: <input type="number" step="any" name="a" required><br>
        Hệ số B: <input type="number" step="any" name="b" required><br>
        Hệ số C: <input type="number" step="any" name="c" required><br>
        <input type="submit" value="Tính nghiệm">
    </form>

    <?php if ($result): ?>
        <h3>Kết quả: <?php echo $result; ?></h3>
    <?php endif; ?>
</body>
</html>
