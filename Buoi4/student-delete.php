<?php
session_start();
require 'students.php';

$id = $_GET['id'] ?? 0;
if ($id) {
    deleteStudent($id);
}
header("Location: student-list.php");
exit();
?>
