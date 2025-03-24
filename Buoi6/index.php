<?php
include 'db.php';
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="upload.php">Thêm sản phẩm mới</a>
    <table border="1">
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='" . $row["image"] . "' width='100'></td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . number_format($row["price"], 0, ',', '.') . " VND</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có sản phẩm nào</td></tr>";
        }
        ?>
    </table>
</body>
</html>
