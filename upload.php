<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'application/pdf'];
    $maxSize = 5 * 1024 * 1024;

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['files']['name'][$key];
        $fileSize = $_FILES['files']['size'][$key];
        $fileType = $_FILES['files']['type'][$key];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = time() . '-' . uniqid() . '.' . $fileExt;
        $filePath = $uploadDir . $newFileName;

        if (!in_array($fileType, $allowedTypes)) {
            echo "❌ File $fileName không hợp lệ!";
            continue;
        }

        if ($fileSize > $maxSize) {
            echo "❌ File $fileName quá lớn!";
            continue;
        }

        if (move_uploaded_file($tmp_name, $filePath)) {
            echo "✅ File $fileName đã upload thành công!";
        } else {
            echo "❌ Lỗi khi upload file $fileName!";
        }
    }
}
?>
