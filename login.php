<?php
session_start();
require "connect.php";

if (isset($_SESSION["login"])) {
  header("Location : index.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($connect, "SELECT * FROM `user` WHERE username = '$username' ");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["name"] = $row["gmail"];
      $_SESSION["status"] = $row["status"];

      header("Location: index.php");
      exit;
    }
  }

  $error = true;

  if ($error == true) {
    echo "<script> alert('Incorrect username or password'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('component/head.php'); ?>
</head>

<body>
  <form action="" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" required>
    <button name="login">Submit</button>
  </form>
</body>

</html>