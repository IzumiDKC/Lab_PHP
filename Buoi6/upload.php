<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = ["jpg", "png", "jpeg", "gif"];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Chỉ chấp nhận file JPG, JPEG, PNG, GIF.");
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO product (name, price, image) VALUES ('$name', '$price', '$targetFile')";
        if ($conn->query($sql)) {
            header("Location: index.php"); // Chuyển hướng về trang index.php
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Lỗi khi tải ảnh.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload Sản Phẩm</title>
</head>
<body>
    <h2>Thêm Sản Phẩm</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Tên sản phẩm: <input type="text" name="name" required><br>
        Giá: <input type="number" name="price" required><br>
        Chọn ảnh: <input type="file" name="image" required><br>
        <button type="submit">Tải lên</button>
    </form>
</body>
</html>
