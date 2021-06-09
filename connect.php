<?php
$servername = "localhost";
$username = "root";
$password = "";

$connect = mysqli_connect($servername, $username, $password, "web_lanjut_course");

if (mysqli_connect_errno()) {
  die("Failed to connect database");
}
