<?php
require "connect.php";
require "component/function.php";

if (isset($_POST["login"])) {
    if (register($_POST) > 0) {
        echo "<script> alert('Successful registration!'); </script>";
    } else {
        return mysqli_error($connect);
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Register </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1> Register </h1>
        <form>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" required>
            <label for="gmail">gmail</label>
            <input type="text" name="gmail" id="gmail" required>
            <label for="telp">telp</label>
            <input type="number" name="telp" id="telp" required>

            <div>
                <input type="radio" id="male" name="gender" value="1" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="0" required>
                <label for="female">Female</label>
            </div>

            <input type="hidden" name="photo" id="photo">
            <input type="hidden" name="status" id="status" value="user">

            <button name="login">Register</button>
            <p>
                Don't have an account? <a href="login.php"> Login </a>
            </p>
        </form>
    </div>
</body>

</html>