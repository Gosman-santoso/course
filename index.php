<?php
session_start();
include_once('component/navbar.php');

if (!isset($_SESSION["login"])) {
  $isLoginUser = false;
} else {
  $isLoginUser = true;
  echo $_SESSION["login"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('component/head.php'); ?>
  <title>Course</title>
</head>

<body>
  <!-- hero -->
  <?php include_once('component/landing/hero.php'); ?>
  <!-- about -->
  <?php include_once('component/landing/about.php'); ?>
  <!-- popular course -->
  <?php include_once('component/landing/course.php'); ?>

  <!-- script -->
  <?php include_once('component/script.php'); ?>
</body>

</html>
<?php include_once('component/footer.php'); ?>