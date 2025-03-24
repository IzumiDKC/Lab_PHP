<?php
$uploadDir = "uploads/";
$files = scandir($uploadDir);
foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        $filePath = $uploadDir . $file;
        $fileExt = pathinfo($file, PATHINFO_EXTENSION);
        
        echo "<div class='file-item'>";
        if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            echo "<img src='$filePath' width='100'>";
        } elseif ($fileExt == "pdf") {
            echo "<a href='$filePath' target='_blank'>$file</a>";
        }
        echo "</div>";
    }
}
?>
