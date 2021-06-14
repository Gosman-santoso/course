<?php
require "component/auth.php";
require "connect.php";
require "component/function.php";

$userId = $_GET['id'];
$userName = $_GET['name'];

$query = "SELECT * FROM user WHERE id=$userId";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $gmail = $_POST['gmail'];
  $gender = $_POST['gender'];
  $telp = $_POST['telp'];
  $fotoLama = $_POST['fotoLama'];

  if ($_FILES['photo']['error'] === 4) {
    $foto = $fotoLama;
  } else {
    $foto = upload();
  }

  $query = "update user set username='$username', gmail='$gmail', gender='$gender', telp='$telp', photo='$foto' where id='$userId'";
  mysqli_query($connect, $query);
  echo "<script>alert('Berhasil edit data!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit User</title>
  <?php require "component/head.php" ?>
</head>

<body>
  <div class="d-flex">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>Edit User</h1>

      <div>
        <form action="" method="post" style="width: 70%" enctype="multipart/form-data">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" value="<?= $row['username'] ?>">
          <label for="gmail">gmail</label>
          <input type="text" name="gmail" id="gmail" value="<?= $row['gmail'] ?>">
          <label for="gender">gender</label>
          <input type="text" name="gender" id="gender" value="<?= $row['gender'] ?>">
          <label for="telp">telp</label>
          <input type="text" name="telp" id="telp" value="<?= $row['telp'] ?>">

          <p style="margin-top: 10px;">Old photo : <?= $row["photo"] ?></p>
          <img src="public/img/photo/<?= $row['photo'] ?>" alt="" width="50" height="50"> <br>

          <label for="photo">New Photo</label>
          <input type="file" name="photo" id="cover" style="width: auto">
          <input type="hidden" name="fotoLama" value="<?= $row['photo'] ?>"></td>

          <button name="submit" class="btn-submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>