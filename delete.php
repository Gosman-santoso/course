<?php include "connect.php";
$table = $_GET['table'];
$id = $_GET['id'];
$file = $_GET['file'];

$q = "delete from $table where id='$id'";
mysqli_query($connect, $q);
header("location:$file.php");
