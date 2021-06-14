<?php
require 'connect.php';
require "component/auth.php";

$idAdmin = $_SESSION['id'];

$query = "SELECT * FROM admin where id = $idAdmin ";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "component/head.php" ?>
  <title>Dashboard</title>
</head>

<body>
  <div class="d-flex">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>Admin Menu</h1>

      <!-- tulis disini -->
      <div style="width: 70%;">
        <img src="public/img/photo/<?= $row['photo'] ?>" alt="" width="">
        <p>Admin Id</p>
        <p><b><?= $row['admin_id'] ?></b></p>
        <p>Name Admin</p>
        <p><b><?= $row['username'] ?></b></p>
        <p>Gmail</p>
        <p><b><?= $row['username'] ?></b></p>
        <p>Gender</p>
        <p><b><?= $row['gender'] == 1 ? 'Male' : 'Female' ?></b></p>

      </div>

    </div>
  </div>
  <?php include_once('component/script.php') ?>
</body>

</html>