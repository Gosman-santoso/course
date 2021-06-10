<?php
session_start();

if (!isset($_SESSION["login"])) {
  $isLogin = false;
} else {
  $isLogin = true;
}

$isLogin = isset($_SESSION["login"]);

?>

<div class="navbar-section d-flex">
  <div class="navbar row">
    <h1 class="col-6 col-md-4 col-lg-4 navbar-title d-flex align-items-center"><span class="color-primary">Nama</span> Course</h1>
    <ul class="col-4 d-flex align-items-center justify-content-between list-style-none">
      <li><a href="" class="text-decoration-none">Home</a></li>
      <li><a href="" class="text-decoration-none">About</a></li>
      <li><a href="" class="text-decoration-none">Course</a></li>
    </ul>

    <div class="col-4 col-md-4 col-lg-4 d-flex align-items-center justify-content-center login-register">
      <?php if (!$isLogin) { ?>
        <a href="login.php" class="color-primary text-decoration-none">Login</a>
        <a href="register.php" class="color-primary text-decoration-none border-button">Register</a>
      <?php } else if ($_SESSION["status"] == "user") { ?>
        <a href="logout.php" class="color-primary text-decoration-none">Logout</a>

      <?php } else if ($_SESSION["status"] == "admin") { ?>
        <a href="dashboard.php" class="color-primary text-decoration-none">Dashboard</a>
        <a href="logout.php" class="color-primary text-decoration-none">Logout</a>
      <?php } ?>
    </div>



  </div>
</div>