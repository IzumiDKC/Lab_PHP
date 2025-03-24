<?php
session_start();
require 'students.php';

$id = $_GET['id'] ?? 0;
$name = "";
$email = "";

if ($id) {
    foreach ($_SESSION['students'] as $student) {
        if ($student['id'] == $id) {
            $name = $student['name'];
            $email = $student['email'];
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    saveStudent($_POST['id'], $_POST['name'], $_POST['email']);
    header("Location: student-list.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? "Sửa" : "Thêm" ?> sinh viên</title>
</head>
<body>
    <h2><?= $id ? "Sửa" : "Thêm" ?> sinh viên</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        Tên: <input type="text" name="name" value="<?= $name ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $email ?>" required><br><br>
        <input type="submit" value="Lưu">
    </form>
    <br>
    <a href="student-list.php">Quay lại danh sách</a>
</body>
</html>
