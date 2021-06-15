<?php
require "connect.php";
require "component/function.php";

if (isset($_POST["login"])) {
  if (registerAdmin($_POST) > 0) {
    echo "<script> alert('Successful registration!'); </script>";
  } else {
    return mysqli_error($connect);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('component/head.php'); ?>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Register</h1>
    <form action="" method="post">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
      <label for="gmail">gmail</label>
      <input type="text" name="gmail" id="gmail" required>

      <div>
        <div class="d-flex">
          <label style="width: 20px" for="male">Male</label>
          <input class="cursor-pointer" style="margin-top: 5px;" type="radio" id="male" name="gender" value="1" required>
        </div>
        <div class="d-flex">
          <label style="width: 20px" for="female">Female</label>
          <input class="cursor-pointer" style="margin-top: 5px;" type="radio" id="female" name="gender" value="0" required>
        </div>
      </div>

      <input type="hidden" name="photo" id="photo">

      <button name="login">Submit</button>
    </form>
    <p>Already have an account? <a href="login-admin.php"> Login </a></p>
  </div>
</body>

</html>