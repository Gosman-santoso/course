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
            $_SESSION["name"] = $row["name"];
            $_SESSION["gmail"] = $row["gmail"];
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

<!DOCTYPE HTML>
<html>

<head>
    <?php include_once('component/head.php'); ?>
    <title> Login </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1> Login </h1>
        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button name="login">Submit</button>
        </form>
        <p>Don't have an account? <a href="register.php"> Register </a></p>
    </div>
</body>

</html>