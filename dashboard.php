<?php
require "connect.php";
require "component/auth.php";

$adminId = $_SESSION['admin_id'];
$firstName = explode(" ", $_SESSION['name']);



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
      <h1>Dashboard Menu</h1>

      <!-- tulis disini -->
      <div>

      </div>
    </div>

  </div>
  <?php include_once('component/script.php') ?>
</body>

</html>