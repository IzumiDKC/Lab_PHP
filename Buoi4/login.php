<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($password == "123") {
        $_SESSION['user'] = $username;
        header("Location: student-list.php");
        exit();
    } else {
        $error = "Sai mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post">
        Tên đăng nhập: <input type="text" name="username" required><br><br>
        Mật khẩu: <input type="password" name="password" required><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
    <p style="color:red"><?= $error ?? "" ?></p>
</body>
</html>
