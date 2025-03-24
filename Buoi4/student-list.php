<?php
session_start();
require 'students.php';
echo "Session ID: " . session_id();

$students = getStudents();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Chào mừng: <?= $_SESSION['user'] ?></h2>
    <h2>Danh sách sinh viên</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $student['email'] ?></td>
            <td>
                <a href="student-add.php?id=<?= $student['id'] ?>">Sửa</a> | 
                <a href="student-delete.php?id=<?= $student['id'] ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="student-add.php">Thêm sinh viên</a> | <a href="logout.php">Đăng xuất</a>
</body>
</html>
