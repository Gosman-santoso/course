<?php
require "connect.php";
require "component/function.php";

if (isset($_POST["login"])) {
    if (register($_POST) > 0) {
        echo "<script> alert('Successful registration!'); </script>";
    } else {
        echo "<script> alert('Failed registration!'); </script>";
        mysqli_error($connect);
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include('component/head.php') ?>
    <title> Register </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1> Register </h1>
        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <label for="gmail">gmail</label>
            <input type="text" name="gmail" id="gmail" required>
            <label for="telp">telp</label>
            <input type="number" name="telp" id="telp" required>

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
            <input type="hidden" name="status" id="status" value="user">

            <button name="login">Register</button>
            <p>
                Already have an account? <a href="login.php"> Login </a>
            </p>
        </form>
    </div>
</body>

</html>