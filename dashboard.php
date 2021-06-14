<?php
require "connect.php";
require "component/auth.php";

$adminId = $_SESSION['admin_id'];
$firstName = explode(" ", $_SESSION['name']);

$queryUser = mysqli_query($connect, "select count(1) FROM user");
$rowUser = mysqli_fetch_array($queryUser);
$totalUser = $rowUser[0];

$queryCourse = mysqli_query($connect, "select count(1) FROM course");
$rowCourse = mysqli_fetch_array($queryCourse);
$totalCourse = $rowCourse[0];


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
      <h2 class="text-capitalize">Hai, <?= $firstName[0]; ?></h2>
      <div class="dashboard">
        <div class="row">
          <div class="card col-6" style="background: #3fdcff;">
            <a href="list-user.php" class="d-flex align-items-center text-decoration-none" style="transform: translateY(1em)">
              <i class="fas fa-users"></i>
              <div>
                <h2>User</h2>
                <p> <?= $totalUser; ?> </p>
              </div>
            </a>
          </div>
          <div class="card col-6" style="background: #4fff6d;">
            <a href="list-course.php" class="d-flex align-items-center text-decoration-none" style="transform: translateY(1em)">
              <i class="fas fa-clipboard-list"></i>
              <div>
                <h2>Course</h2>
                <p><?= $totalCourse; ?></p>
              </div>
            </a>
          </div>
          <div class="card col-6" style="background: #ffcd72;">
            <a href="list-admin.php" class="d-flex align-items-center text-decoration-none" style="transform: translateY(1em)">
              <i class="fas fa-headset"></i>
              <div>
                <h2>Profile Admin</h2>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php include_once('component/script.php') ?>
</body>

</html>