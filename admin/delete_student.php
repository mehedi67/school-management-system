<?php
require_once "dbcon.php";
$id= base64_decode($_GET['id']);

$delete = "DELETE FROM student_info WHERE id='$id'";
$conn->query($delete);
header("location:index.php?page=all-student")




?>