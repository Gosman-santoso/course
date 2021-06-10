<?php require "connect.php";
function register($data)
{
  global $connect;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($connect, $data["password"]);
  $gmail = strtolower(stripslashes($data["gmail"]));
  $telp = $data["telp"];
  $status = $data["status"];

  $gender = $data["gender"];
  if ($gender == 1) {
    $photo = "male.png";
  } else {
    $photo = "female.png";
  }

  // encript password with md5
  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($connect, "INSERT INTO user VALUES('', '$username', '$password', '$gmail', '$gender', $telp, '$photo', '$status') ");

  return mysqli_affected_rows($connect);
}
