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

  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($connect, "INSERT INTO user VALUES(NULL, '$username', '$password', '$gmail', '$gender', $telp, '$photo', '$status') ") or die(mysqli_error($connect));

  return mysqli_affected_rows($connect) or die(mysqli_error($connect));
}

function registerAdmin($data)
{
  global $connect;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($connect, $data["password"]);
  $gmail = strtolower(stripslashes($data["gmail"]));
  $admin_id = "adm-" . rand(1000, 9999);


  $gender = $data["gender"];
  if ($gender == 1) {
    $photo = "male.png";
  } else {
    $photo = "female.png";
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($connect, "INSERT INTO `admin` VALUES(NULL, '$username', '$password', '$gmail', '$gender', '$admin_id', '$photo', 'admin') ") or die(mysqli_error($connect));

  return mysqli_affected_rows($connect);
}

function ckeditor($data, $dataImg)
{
  global $connect;

  $courseId = $data["course_id"];
  $adminId = $_SESSION["admin_id"];
  $title = $data['title'];
  $description = $data['editor'];
  $cover = upload($courseId, $dataImg);
  $linkVideo = $data['link_video'];
  $tanggal = date('Y-m-d', strtotime($data['date']));
  $status = $data['status'];

  if (!empty($editorContent) || $cover) {
    // $query = "UPDATE `course` SET `description` = '" . $editorContent . "' WHERE `course`.`id` = $idContent";
    // $query = "UPDATE `course` SET `description` = '" . $description . "' WHERE `course`.`id` = $idContent";
    $query = "INSERT INTO `course` VALUES ('', '$courseId', '$adminId', '$title', '$description', 0, '$cover', '$linkVideo', '$tanggal', '$status')";

    $insert = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if ($insert) {
      echo "<script>alert('Content added successfully');</script>";
    } else {
      echo "<script>alert('Failed to add content!');</script>";
    }
  } else {
    $message = "Please complete the form";
  }
}

function upload($courseId, $dataImg)
{
  $name = $dataImg["cover"]["name"];
  $error = $dataImg["cover"]["error"];
  $tmp = $dataImg["cover"]["tmp_name"];

  if ($error === 4) {
    echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
    return false;
  }

  $extention = ['jpg', 'jpeg', 'png'];
  $extentionImage = explode('.', $name);
  $extentionImage = strtolower(end($extentionImage));
  if (!in_array($extentionImage, $extention)) {
    echo "<script>alert('Tipe gambar tidak valid!');</script>";
    return false;
  }

  $newName = $courseId . '-' . rand(1000, 9999) . '.' . $extentionImage;

  move_uploaded_file($tmp, 'public/img/thumbnail/' . $newName);
  return $newName;
}

function uploadUserAdmin($dataImg)
{
  $name = $dataImg["photo"]["name"];
  $error = $dataImg["photo"]["error"];
  $tmp = $dataImg["photo"]["tmp_name"];

  if ($error === 4) {
    echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
    return false;
  }

  $extention = ['jpg', 'jpeg', 'png'];
  $extentionImage = explode('.', $name);
  $extentionImage = strtolower(end($extentionImage));
  if (!in_array($extentionImage, $extention)) {
    echo "<script>alert('Tipe gambar tidak valid!');</script>";
    return false;
  }

  $newName = 'profile-' . rand(1000, 9999) . $extentionImage;

  move_uploaded_file($tmp, 'public/img/photo/' . $newName);
  return $newName;
}
