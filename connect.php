<?php
$servername = "blpdqrk72xmgfwjzvxnp-mysql.services.clever-cloud.com";
$username = "uluubyzxwdvmbhhl";
$password = "cy71wzRcGUwcDPksf1sc";

$connect = mysqli_connect($servername, $username, $password, "blpdqrk72xmgfwjzvxnp");

if (mysqli_connect_errno()) {
  die("Failed to connect database");
}
